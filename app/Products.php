<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\ImageShare;
use App\ImagesProducts;
use App\ProductLogs;
use App\ProductDetailLogs;
use App\Categories;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use GuzzleHttp\Message\Response;


class Products extends Model
{
    //
    protected $table = 'products';



    public function addProduct($request){
        $image_share = $request->file('share_image')->getClientOriginalName();
        $avatar = $request->file('avatar')->getClientOriginalName();
    	$pr = new Products;
    	$pr->name = $request->name;
        $pr->code = $request->code;
    	$pr->categories_id = $request->categories_id;
    	$pr->url = $request->url;
    	$pr->content = $request->content;
    	$pr->seo_keyword = $request->seo_keyword;
    	$pr->seo_description = $request->seo_description;
        $pr->short_description = $request->short_description;
    	$pr->title = $request->title;
        $pr->share_image = $image_share;
        $pr->rate = 0;
        $pr->display = $request->display;
        $pr->views = 0;
        $pr->orders = 0;
        $pr->highlights = $request->highlights;
        $pr->video = $request->video;
        $products_detail = $request->products_detail;
        $price = $request->price;
        if(isset($products_detail)){
            $pr->price = $this->minPrice(count($price),$request);
            $pr->amount = $this->countAmount(count($products_detail),$request);
            $pr->save();
            for($i=0;$i<count($products_detail);$i++){
                if(isset($products_detail[$i])){
                    $productDetail = new ProductsDetail;
                    $productDetail->price = $request->price[$i];
                    $productDetail->amount = $request->amount[$i];
                    $productDetail->sale = $request->sale[$i];
                    $productDetail->products_id = $pr->id;
                    $productDetail->save();
                    $this->addProductDetailLog($productDetail);
                    $countPropertiesDetail = count($products_detail[$i]);
                    for($j=0;$j<$countPropertiesDetail;$j++){
                        $productsProperties = new productsProperties;
                        $productsProperties->products_detail_id = $productDetail->id;
                        $productsProperties->properties_id = $products_detail[$i][$j];
                        $productsProperties->save();
                    }
                }
            }
        }
        else{
            $pr->price = $request->price[0];
            $pr->amount = $request->amount[0];
            $pr->save();
            $productDetail = new ProductsDetail;
            $productDetail->price = $request->price[0];
            $productDetail->amount = $request->amount[0];
            $productDetail->sale = $request->sale[0];
            $productDetail->products_id = $pr->id;
            $productDetail->save();
            $this->addProductDetailLog($productDetail);
        }
        if(Input::hasFile('image_detail')){
            foreach(Input::file('image_detail') as $file){
                if(isset($file)){
                    $file_name = $file->getClientOriginalName();
                    $file->move('uploads/images/products/detail/',$file_name);
                    $img_detail = new ImagesProducts;
                    $img_detail->role = 0;
                    $img_detail->url = $file_name;
                    $img_detail->products_id = $pr->id;
                    $img_detail->save();
                }
            }
        }
    	$request->file('share_image')->move('uploads/images/products/image_share/',$image_share);
        $img_share = new ImageShare;
        $img_share->url = $image_share;
        $img_share->save();
        $request->file('avatar')->move('uploads/images/products/avatar/',$avatar);
        $img_avatar = new ImagesProducts;
        $img_avatar->role = 1;
        $img_avatar->url = $avatar;
        $img_avatar->products_id = $pr->id;
        $img_avatar->save();
        $this->addProductLog($pr);
    }
    public function editProduct($request,$id){
        $pr= Products::where('id',$id)->get()->first();
        $pr->name = $request->name;
        $pr->code = $request->code;
        $pr->categories_id = $request->categories_id;
        $pr->url = $request->url;
        $pr->content = $request->content;
        $pr->seo_keyword = $request->seo_keyword;
        $pr->seo_description = $request->seo_description;
        $pr->short_description = $request->short_description;
        $pr->title = $request->title;
        if(Input::hasFile('share_image')){
            $file_name = $request->file('share_image')->getClientOriginalName();
            $pr->share_image = $file_name;
            $request->file('share_image')->move('uploads/images/products/image_share/',$file_name); 
        }
        if(Input::hasFile('avatar')){
            $ava_name = $request->file('avatar')->getClientOriginalName();
            $request->file('avatar')->move('uploads/images/products/avatar/',$ava_name);
            $image_ava = ImagesProducts::where('products_id',$id)->where('role',1)->get()->first();
            $image_ava->url = $ava_name;
            $image_ava->save();
        }
        $pr->display = $request->display;
        $pr->highlights = $request->highlights;
        $pr->video = $request->video;
        $pr->save();
        // ------
        $image_detail = ImagesProducts::where('products_id',$id)->where('role',0)->get();
        foreach($image_detail as $image){
            if(Input::hasFile($image->id)){
                $file = $request->file($image->id);
                $file_name = $file->getClientOriginalName();
                $image->url = $file_name;
                $file->move('uploads/images/products/detail/',$file_name); 
                $image->save();
            }
        }
        if(Input::hasFile('image_detail')){
            foreach(Input::file('image_detail') as $file){
                if(isset($file)){
                    $file_name = $file->getClientOriginalName();
                    $file->move('uploads/images/products/detail/',$file_name);
                    $img_detail = new ImagesProducts;
                    $img_detail->role = 0;
                    $img_detail->url = $file_name;
                    $img_detail->products_id = $pr->id;
                    $img_detail->save();
                }
            }
        }
        $this->editProductLog($pr);
    }
    public function countAmount($countProperties,$request){
        $countAmount = 0;
        for($i=0;$i<$countProperties;$i++){
            $countAmount = $countAmount + $request->amount[$i];
        }
        return $countAmount;
    }
    public function minPrice($countPrice, $request){
        $minPrice = $request->price[0];
        for($i=0;$i<$countPrice;$i++){
            if($request->price[$i]<$minPrice){
                $minPrice = $request->price[$i];
            }
        }
        return $minPrice;
    }
    public function addProductLog($pr){
        $prLog = new ProductLogs;
        $cate = Categories::where('id',$pr->categories_id)->get()->first();
        $display = '';
        $highlight = '';
        $link_image ='';
        $userName = Auth::user()->name;
        if($pr->display ==0){
            $display ='Không xuất bản';
        }
        else{
            $display ='Xuất bản';
        }
        if($pr->highlights ==0){
            $highlight ='Không nổi bật';
        }
        else{
            $highlight ='Nổi bật';
        }
        $avatar = ImagesProducts::where('products_id',$pr->id)->where('role',1)->get()->first();
        $images = ImagesProducts::where('products_id',$pr->id)->where('role',0)->get();
        foreach($images as $image){
            $link_image = ''.$link_image.'<img src="{{asset("uploads/images/products/detail/'.$image->url.'")}}" />';
        }
        $prLog->products_id = $pr->id;
        $prLog->content= '<p>Khởi tạo sản phẩm</p></br><p>Người thực hiện: '.$userName.'</p></br><p>Tên sản phẩm: '.$pr->name.'</p></br><p>Mã sản phẩm: '.$pr->code.'</p></br><p>Danh mục chứa: '.$cate->name.'</p></br><p>Tiêu đề: '.$pr->title.'</p></br><p>Keyword: '.$pr->seo_keyword.'</p></br><p>Description: '.$pr->seo_description.'</p></br><p>Mô tả ngắn: '.$pr->short_description.'</p></br><p>Xuất bản: '.$display.'</p></br><p>Nổi bật: '.$highlight.'</p></br><p>Video: <a href="youtube.com/watch?v='.$pr->video.'">Link video</a></p></br><p>Ảnh đại diện:</p><img src="{{asset("uploads/images/products/avatar/'.$avatar->url.'")}}" /></br><p>Ảnh chi tiết: </p>'.$link_image.'</br></br>';
        $prLog->save();
        return true;
    }
    public function editProductLog($pr){
        $prLog = new ProductLogs;
        $cate = Categories::where('id',$pr->categories_id)->get()->first();
        $display = '';
        $highlight = '';
        $link_image ='';
        $userName = Auth::user()->name;
        if($pr->display ==0){
            $display ='Không xuất bản';
        }
        else{
            $display ='Xuất bản';
        }
        if($pr->highlights ==0){
            $highlight ='Không nổi bật';
        }
        else{
            $highlight ='Nổi bật';
        }
        $avatar = ImagesProducts::where('products_id',$pr->id)->where('role',1)->get()->first();
        $images = ImagesProducts::where('products_id',$pr->id)->where('role',0)->get();
        foreach($images as $image){
            $link_image = ''.$link_image.'<img src="{{asset("uploads/images/products/detail/'.$image->url.'")}}" />';
        }
        $prLog->products_id = $pr->id;
        $prLog->content= '<p>Chỉnh sửa sản phẩm</p></br><p>Người thực hiện: '.$userName.'</p></br><p>Tên sản phẩm: '.$pr->name.'</p></br><p>Mã sản phẩm: '.$pr->code.'</p></br><p>Danh mục chứa: '.$cate->name.'</p></br><p>Tiêu đề: '.$pr->title.'</p></br><p>Keyword: '.$pr->seo_keyword.'</p></br><p>Description: '.$pr->seo_description.'</p></br><p>Mô tả ngắn: '.$pr->short_description.'</p></br><p>Xuất bản: '.$display.'</p></br><p>Nổi bật: '.$highlight.'</p></br><p>Video: <a href="youtube.com/watch?v='.$pr->video.'">Link video</a></p></br><p>Ảnh đại diện:</p><img src="{{asset("uploads/images/products/avatar/'.$avatar->url.'")}}" /></br><p>Ảnh chi tiết: </p>'.$link_image.'</br></br>';
        $prLog->save();
        return true;
    }
    public function addProductDetailLog($productDetail){
        $prDL = new ProductDetailLogs;
        $prDL->products_detail_id = $productDetail->id;
        $prDL->content = '<p>Khởi tạo sản phẩm chi tiết</p><br/><p>Giá: '.$productDetail->price.'</p><br/><p>Giá sale: '.$productDetail->sale.'</p><br/><p>Số lượng: '.$productDetail->amount.'</p>';
        $prDL->save();
        return true;
    }
    public function editProductDetailLog($productDetail){
        $prDL = new ProductDetailLogs;
        $prDL->products_detail_id = $productDetail->id;
        $prDL->content = '<p>Chỉnh sửa sản phẩm chi tiết</p><br/><p>Giá: '.$productDetail->price.'</p><br/><p>Giá sale: '.$productDetail->sale.'</p><br/><p>Số lượng: '.$productDetail->amount.'</p>';
        $prDL->save();
        return true;
    }
}
