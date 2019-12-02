<?php

namespace App\Http\Controllers\AuthClient;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Categories;
use App\Systems;
use App\Products;
use App\TagCategories;
use App\ImagesProducts;
use App\ProductsDetail;
use App\Properties;
use App\ProductsProperties;
use App\PropertiesType;
use App\FollowSystems;
use App\Orders;
use App\OrdersDetail;
use App\UsersClient;
use App\Feedbacks;
use App\Blogs;
use App\Slides;
use App\Menus;
use App\Http\Requests\addUserClientRequest;
use App\Http\Controllers\AuthClient\LoginController;
use Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Collection;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class ClientController extends Controller
{
    //
    public function index(){
    	$system = Systems::where('id',1)->get()->first();
        $cates = Categories::where('systems_id',$system->id)->where('display',1)->get();
        $cates_highlight = Categories::where('display',1)->where('highlights',1)->get();
        $blogs = Blogs::where('display',1)->orderBy('id','ASC')->take(6)->get();
        $slides = Slides::where('display',1)->orderBy('stt','ASC')->get();
        $menus = Menus::select()->orderBy('stt','ASC')->get();
        $cate = $this->arrayColumn($cates,$col='id');
        $products_highlight = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->where('products.display',1)->where('products.highlights',1)->where('images_products.role',1)->orderBy('products.updated_at', 'DESC')
            ->select('products.*', 'images_products.url AS avatar','products_detail.price AS maxPrice','products_detail.products_id','products_detail.id AS products_detail_id','products_detail.sale')
            ->get();
        $productsGroup = $this->groupProduct($products_highlight);
        $products_highlight = $this->filterProduct($productsGroup);

    	return view('front-end.page-content.home',['system'=>$system,'cates'=>$cates,'products_highlight'=>$products_highlight,'cates_highlight'=>$cates_highlight,'blogs'=>$blogs,'slides'=>$slides,'menus'=>$menus]);
        
        
        
    }
    public function paginateCustum($items, $perPage = 15, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function rootPageContent($url) {
    	$cates = Categories::where('url', $url)->get();
        $products = Products::where('url',$url)->get(); 
    	$systems = Systems::where('website',$url)->get();
        $blogs = Blogs::where('url',$url)->get();

    	if(!$systems->isEmpty()){
    		$system = $systems->first();
            if($system->id ==1){

                $cates = Categories::where('systems_id',$system->id)->where('display',1)->get();
                $cateRoot = array();
                $x = 0;
                for($i=0;$i<count($cates);$i++){
                    if($cates[$i]->id == $cates[$i]->parent_id){
                        $cateRoot[$x]=$cates[$i];
                        $x++;
                    }
                    else{}
                }
                $cate = $this->arrayColumn($cates,$col='id');
                $products = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->whereIn('products.categories_id',$cate)->where('products.display',1)->where('images_products.role',1)
                ->select('products.*', 'images_products.url AS avatar')
                ->get();
                $products_highlights = array();
                $products_news = array();
                $cate_news = array();
                $cate_highlights=array();
        		return view('front-end.page-content.home-business',['system'=>$system,'cates'=>$cates,'products'=>$products]);
                // dd($cateRoot);
            }
            else{
                $cates = Categories::where('systems_id',$system->id)->where('display',1)->get();
                $cate_highlights = Categories::where('systems_id',$system->id)->where('display',1)->where('highlights',1)->orderBy('updated_at', 'ASC')->get();
                
                
                // lọc sản phẩm nổi bật thuộc các danh mục đã chọn ra trả về mảng 2 chiều x,y. x là danh mục, y là sản phẩm
                $products_highlights = array();
                for($i=0;$i<count($cate_highlights);$i++){
                    $arrayIdCateChildHighlight = array();
                    $arrayIdCateChildHighlight = $this->getIdChildCategorieAllLevel($cate_highlights[$i]->id,$arrayIdCateChildHighlight);
                    $arrayIdCateChildHighlight[count($arrayIdCateChildHighlight)]=$cate_highlights[$i]->id;
                    $product = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->whereIn('products.categories_id',$arrayIdCateChildHighlight)->where('products.display',1)->where('products.highlights',1)->where('images_products.role',1)
                    ->select('products.*', 'images_products.url AS avatar','products_detail.price AS maxPrice','products_detail.products_id')->orderBy('products.updated_at', 'DESC')
                    ->get();
                    $productsGroup = $this->groupProduct($product);
                    $product = $this->filterProduct($productsGroup);
                    if(count($product)==0){
                        $products_highlights[$i][0]=null;

                    }
                    elseif(count($product)>10){
                        for($j=0;$j<10;$j++){
                            $products_highlights[$i][$j]=$product[$j];
                        }
                    }
                    else{
                        for($j=0;$j<count($product);$j++){
                            $products_highlights[$i][$j]=$product[$j];
                        }
                    }
                    
                }
                //end lọc sản phẩm nổi bật thuộc các danh mục đã chọn ra trả về mảng 2 chiều x,y. x là danh mục, y là sản phẩm
                // ----------------------------
                // lọc ra danh mục con của các danh mục highlight + danh mục highlight 
                $arrayIdChildCategorieHighlightContainer = array();
                $arrayIdChildCategorie = array();
                
                $q =0;
                foreach($cate_highlights as $cate_highlight){
                    
                    $array = $this->getIdChildCategorieAllLevel($cate_highlight->id,$arrayIdChildCategorie);
                    // thêm danh mục highlight và sắp sếp
                    if(count($array)==0){

                        $array[0]=$cate_highlight->id;
                        
                        $arrayIdChildCategorieHighlightContainer[$q][0]=$array[0];
                        
                        $q++;
                    }
                    else{
                        $tt = $array[0];
                        $array[0]=$cate_highlight->id;
                        for($i=1;$i<count($array);$i++){
                            $tg=$array[$i];
                            $array[$i]=$tt;
                            $tt=$tg;
                        }
                        $array[count($array)]=$tt;
                        for($j=0;$j<count($array);$j++){
                            $arrayIdChildCategorieHighlightContainer[$q][$j]=$array[$j];
                        }
                        $q++;
                    }
                    //end thêm danh mục highlight và sắp sếp
                }
                // end lọc ra danh mục con của các danh mục highlight + danh mục highlight
                // --------------------------
                // lọc sản phẩm mới thuộc các danh mục đã chọn ra trả về mảng 2 chiều x,y. x là danh mục, y là sản phẩm
                
                $products_news = array();

                for($i=0;$i<count($cate_highlights);$i++){

                    for($w=0;$w<count($arrayIdChildCategorieHighlightContainer[$i]);$w++){
                        $array=array();
                        $c = $this->getIdChildCategorieAllLevel($arrayIdChildCategorieHighlightContainer[$i][$w],$array);
                        $c[count($c)]=$arrayIdChildCategorieHighlightContainer[$i][$w];
                        $product = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->whereIn('products.categories_id',$c)->where('products.display',1)->where('images_products.role',1)
                        ->select('products.*', 'images_products.url AS avatar','products_detail.price AS maxPrice','products_detail.products_id')->orderBy('products.id', 'DESC')
                        ->get();
                        $productsGroup = $this->groupProduct($product);
                        $product = $this->filterProduct($productsGroup);
                        if(count($product)==0){
                            $products_news[$i][$w][0]=null;

                        }
                        elseif(count($product)>=10){
                            for($j=0;$j<10;$j++){
                                $products_news[$i][$w][$j]=$product[$j];
                            }
                        }
                        else{
                            for($j=0;$j<count($product);$j++){
                                $products_news[$i][$w][$j]=$product[$j];
                            }
                        }
                    }
                }
                $cate_news = array();
                for($i=0;$i<count($arrayIdChildCategorieHighlightContainer);$i++){
                    for($j=0;$j<count($arrayIdChildCategorieHighlightContainer[$i]);$j++){
                        $cate_news[$i][$j] = Categories::where('id',$arrayIdChildCategorieHighlightContainer[$i][$j])->get()->first();
                    }
                }

                //end lọc sản phẩm mới thuộc các danh mục đã chọn ra trả về mảng 2 chiều x,y. x là danh mục, y là sản phẩm

                // lấy ds sản phẩm thuộc gian hàng được người dùng follow
                $system_follow = array();
                $products_recommend = array();
                if(Auth::guard('users_client')->check()){
                    $system_follow = FollowSystems::where('users_clients_id',Auth::guard('users_client')->user()->id)->get();
                    $systemsId = $this->arrayColumn($system_follow,$col='systems_id');
                    $system_follow = Systems::whereIn('id',$systemsId)->get();
                    
                    for($i=0;$i<count($systemsId);$i++){
                        $array = Categories::where('systems_id',$systemsId[$i])->where('display',1)->get();
                        $array = $this->arrayColumn($array,$col='id');
                        $product = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->whereIn('products.categories_id',$array)->where('products.display',1)->where('images_products.role',1)
                            ->select('products.*', 'images_products.url AS avatar','products_detail.price AS maxPrice','products_detail.products_id')->orderBy('products.id', 'DESC')
                            ->get();
                        $productsGroup = $this->groupProduct($product);
                        $product = $this->filterProduct($productsGroup);
                        if(count($product)==0){
                            $products_recommend[$i][0]=null;
                        }
                        elseif(count($product)>10){
                            for($j=0;$j<10;$j++){
                                $products_recommend[$i][$j]=$product[$j];
                            }
                        }
                        else{
                            
                            $products_recommend[$i]=$product;
                            
                        }

                    }
                    
                }
                 // lấy ds sản phẩm thuộc gian hàng được người dùng follow
                return view('front-end.page-content.home',['system'=>$system,'cates'=>$cates,'products_highlights'=>$products_highlights,'products_news'=>$products_news,'cate_highlights'=>$cate_highlights,'cate_news'=>$cate_news,'system_follow'=>$system_follow,'products_recommend'=>$products_recommend]);
                // $test =0;
                // $tt = 0;
                // foreach($products_highlights as $products_highlight){
                //     if($products_highlight[$tt]->isEmpty()){
                //         $test =1;
                //     }
                //     $tt++;
                // }
                // dd($cate_highlights);
                
            }
    	}
    	if(!$cates->isEmpty()){
            $system = Systems::where('id',1)->get()->first();
            $cate = Categories::where('url',$url)->get()->first();
            $menus = Menus::select()->orderBy('stt','ASC')->get();
            $cates = Categories::where('systems_id',1)->where('id','!=',1)->where('display',1)->get();
            $cateRoot = array();
            $x = 0;
            for($i=0;$i<count($cates);$i++){
                if($cates[$i]->parent_id == 1){
                    $cateRoot[$x]=$cates[$i];
                    $x++;
                }
                else{}
            }
            $cates = $cateRoot;
            //lấy list danh mục các gian hàng có tag là danh mục root đang chọn 
            $arrayIdChild = array();
            $arrayIdChild = $this->getIdChildCategorieAllLevel($cate->id,$arrayIdChild);
            $arrayIdChild[count($arrayIdChild)]=$cate->id;
            //end lấy danh mục con của danh mục root_categorie_id
            // --------------------------------------
            $products = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->whereIn('products.categories_id',$arrayIdChild)->where('products.display',1)->where('images_products.role',1)
            ->select('products.*', 'images_products.url AS avatar','products_detail.price AS maxPrice','products_detail.products_id','products_detail.id AS products_detail_id','products_detail.sale')
            ->get();
            $productsGroup = $this->groupProduct($products);
            $products = $this->filterProduct($productsGroup);
            $products = $this->paginateCustum($products, $perPage = 9, $page = null, $options = []);
            $products_highlight = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->where('products.display',1)->where('products.highlights',1)->where('images_products.role',1)->orderBy('products.updated_at', 'DESC')
            ->select('products.*', 'images_products.url AS avatar','products_detail.price AS maxPrice','products_detail.products_id','products_detail.id AS products_detail_id','products_detail.sale')
            ->get();
            $productsGroup = $this->groupProduct($products_highlight);
            $products_highlight = $this->filterProduct($productsGroup);
            $cate = Categories::where('url',$url)->get()->first();
    		return view('front-end.page-content.categorie',['system'=>$system,'cates'=>$cates,'cate'=>$cate,'products'=>$products,'menus'=>$menus,'products_highlight'=>$products_highlight]);
            
    	}
        if(!$products->isEmpty()){
            $system = Systems::where('id',1)->get()->first();
            $cates = Categories::where('systems_id',1)->where('display',1)->get();
            $menus = Menus::select()->orderBy('stt','ASC')->get();
            $products = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->where('products.url',$url)->where('images_products.role',1)
            ->select('products.*', 'images_products.url AS avatar','products_detail.price AS maxPrice','products_detail.products_id','products_detail.id AS products_detail_id','products_detail.sale')
            ->get();
            $productsGroup = $this->groupProduct($products);
            $products = $this->filterProduct($productsGroup);

            $images = ImagesProducts::where('products_id',$products[0]->products_id)->where('role',0)->get();
            $products_detail = ProductsDetail::where('products_id',$products[0]->products_id)->get();
            $arrayProductsDetailId = $this->arrayColumn($products_detail,$col='id');
            $products_properties = ProductsProperties::whereIn('products_detail_id',$arrayProductsDetailId)->get();
            $arrayPropertiesId = $this->arrayColumn($products_properties,$col='properties_id');
            $properties = Properties::whereIn('id',$arrayPropertiesId)->get();
            $arrayPropertiesTypeId = $this->arrayColumn($properties,$col='properties_type_id');
            $properties_type = PropertiesType::whereIn('id',$arrayPropertiesTypeId)->get();
            $array = array();
            for($i=0;$i<count($properties_type);$i++){
                $x=0;
                for($j=0;$j<count($properties);$j++){
                    if($properties_type[$i]->id == $properties[$j]->properties_type_id){
                        $array[$i][$x] = $properties[$j];
                        $x++;
                    }
                }
            }
            $properties = $array;
            
            $products = $products[0];
            $cate_parent = Categories::where('id', $products->categories_id)->get()->first();
            $products_same = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->where('products.categories_id',$cate_parent->id)->where('products.id','!=',$products->id)->where('images_products.role',1)
            ->select('products.*', 'images_products.url AS avatar','products_detail.price AS maxPrice','products_detail.products_id','products_detail.id AS products_detail_id')
            ->get();
            $products_same_group = $this->groupProduct($products_same);
            $products_same = $this->filterProduct($products_same_group);
            return view('front-end.page-content.product',['system'=>$system,'cates'=>$cates,'products'=>$products,'images'=>$images,'properties_type'=>$properties_type,'properties'=>$properties, 'cate_parent'=>$cate_parent,'products_same'=>$products_same,'menus'=>$menus]);
            // dd($content);
            
        }
        if(!$blogs->isEmpty()){
            $system = Systems::where('id',1)->get()->first();
            $cates = Categories::where('systems_id',1)->where('display',1)->get();
            $menus = Menus::select()->orderBy('stt','ASC')->get();
            $blog = Blogs::where('url',$url)->get()->first();
            return view('front-end.page-content.blog',['system'=>$system,'cates'=>$cates,'menus'=>$menus,'blog'=>$blog]);
        }
        else{
            echo "lỗi";
        }
    	
    }
    public function businessPageContent($system_url,$url){
        $cates = Categories::where('url', $url)->get();
        $products = Products::where('url',$url)->get();
        if(!$cates->isEmpty()){
            $system = Systems::where('website',$system_url)->get()->first();
            $cate = Categories::where('url',$url)->get()->first();
            $cates = Categories::where('systems_id',$system->id)->where('display',1)->get();
            $cateRoot = array();
            $x = 0;
            for($i=0;$i<count($cates);$i++){
                if($cates[$i]->id == $cates[$i]->parent_id){
                    $cateRoot[$x]=$cates[$i];
                    $x++;
                }
                else{}
            }
            $cates = $cateRoot;
            $arrayIdChild= array();
            $arrayIdChild = $this->getIdChildCategorieAllLevel($cate->id,$arrayIdChild);
            $arrayIdChild[count($arrayIdChild)]=$cate->id;

            $products = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->whereIn('products.categories_id',$arrayIdChild)->where('products.display',1)->where('images_products.role',1)
            ->select('products.*', 'images_products.url AS avatar','products_detail.price AS maxPrice','products_detail.products_id')
            ->get();
            $productsGroup = $this->groupProduct($products);
            $products = $this->filterProduct($productsGroup);
            return view('front-end.page-content.categorie',['system'=>$system,'cates'=>$cates,'cate'=>$cate,'products'=>$products]);
        }
        if(!$products->isEmpty()){
            $system = Systems::where('website',$system_url)->get()->first();
            $cates = Categories::where('systems_id',$system->id)->where('display',1)->get();
            $products = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->where('products.url',$url)->where('images_products.role',1)
            ->select('products.*', 'images_products.url AS avatar','products_detail.price AS maxPrice','products_detail.products_id')
            ->get();
            $productsGroup = $this->groupProduct($products);
            $products = $this->filterProduct($productsGroup);
            $images = ImagesProducts::where('products_id',$products[0]->products_id)->where('role',0)->get();
            $products_detail = ProductsDetail::where('products_id',$products[0]->products_id)->get();
            $arrayProductsDetailId = $this->arrayColumn($products_detail,$col='id');
            $products_properties = ProductsProperties::whereIn('products_detail_id',$arrayProductsDetailId)->get();
            $arrayPropertiesId = $this->arrayColumn($products_properties,$col='properties_id');
            $properties = Properties::whereIn('id',$arrayPropertiesId)->get();
            $arrayPropertiesTypeId = $this->arrayColumn($properties,$col='properties_type_id');
            $properties_type = PropertiesType::whereIn('id',$arrayPropertiesTypeId)->get();
            $array = array();
            for($i=0;$i<count($properties_type);$i++){
                $x=0;
                for($j=0;$j<count($properties);$j++){
                    if($properties_type[$i]->id == $properties[$j]->properties_type_id){
                        $array[$i][$x] = $properties[$j];
                        $x++;
                    }
                }
            }
            $properties = $array;
            
            $products = $products[0];
            return view('front-end.page-content.product',['system'=>$system,'cates'=>$cates,'products'=>$products,'images'=>$images,'properties_type'=>$properties_type,'properties'=>$properties]);
            // dd($content);
            
        }


    }
    public static function arrayColumn($object,$col){
        $array = array();
        $i = 0;
        foreach($object as $cate){
            $array[$i] = $cate->$col;
            $i++;
        }
        return $array;
    }
    // ------------------------------------------
    // trả về mảng id danh mục con của danh mục lựa chọn
    // $id id của danh mục lựa chọn
    // $arrayIdChildCategorie mảng rỗng array()
    // $arrayNumber chỉ số mảng = 0
    public function getIdChildCategorieAllLevel($id,$arrayIdChildCategorie){
        $cates=Categories::where('parent_id', $id)->get();
        $i=0;
        $array = array();
        foreach($cates as $cate){
            if($cate->id == $cate->parent_id){

            }
            else{
                $array[$i] = $cate->id;
                $i++;
            }
        }

        if(count($array)==0){
            
        }
        else{
            for($j=0;$j<count($array);$j++){

                    $arrayIdChildCategorie[count($arrayIdChildCategorie)]=$array[$j];
                    $arrayIdChildCategorie = $this->getIdChildCategorieAllLevel($array[$j],$arrayIdChildCategorie);
            }
            
        }
        return $arrayIdChildCategorie;
    }

    // end trả về mảng id danh mục con của danh mục lựa chọn
    // -------------------------------------------
    // tìm kiếm bằng từ khóa trang root
    public function searchText(Request $request){
        $system = Systems::where('id',1)->get()->first();
        $menus = Menus::select()->orderBy('stt','ASC')->get();
        $cates = Categories::where('systems_id',1)->where('id','!=',1)->where('display',1)->get();
        $products = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->where('products.display',1)->where('products.name', 'like', '%' .$request->s.'%')->where('images_products.role',1)
            ->select('products.*', 'images_products.url AS avatar','products_detail.price AS maxPrice','products_detail.products_id','products_detail.id AS products_detail_id','products_detail.sale')
            ->get();
        $productsGroup = $this->groupProduct($products);
        $products = $this->filterProduct($productsGroup);
        $products = $this->paginateCustum($products, $perPage = 9, $page = null, $options = []);
        $products_highlight = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->where('products.display',1)->where('products.highlights',1)->where('images_products.role',1)->orderBy('products.updated_at', 'DESC')
            ->select('products.*', 'images_products.url AS avatar','products_detail.price AS maxPrice','products_detail.products_id','products_detail.id AS products_detail_id','products_detail.sale')
            ->get();
        $productsGroup = $this->groupProduct($products_highlight);
        $products_highlight = $this->filterProduct($productsGroup);
        return view('front-end.page-content.product_search',['system'=>$system,'cates'=>$cates,'products'=>$products,'menus'=>$menus,'products_highlight'=>$products_highlight]);
    }
    public function rootSearchText($cate_id, $cate_name, $search_text){
        if($cate_id ==0){
            $system = Systems::where('id',1)->get()->first();
            $cates = Categories::where('systems_id',$system->id)->where('display',1)->get();
            $cates_taget = Categories::select()->get();
            $cate = $this->arrayColumn($cates_taget,$col='id');
            $products = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->whereIn('products.categories_id',$cate)->where('products.display',1)->where('products.name', 'like', '%' .$search_text.'%')->where('images_products.role',1)
            ->select('products.*', 'images_products.url AS avatar','products_detail.price AS maxPrice','products_detail.products_id')
            ->get();
            $productsGroup = $this->groupProduct($products);
            $products = $this->filterProduct($productsGroup);
            // dd($products);
            return view('front-end.page-content.product-search',['system'=>$system,'cates'=>$cates,'products'=>$products]);
        }
        else{
            $system = Systems::where('id',1)->get()->first();
            $cates = Categories::where('systems_id',$system->id)->where('display',1)->get();
            //lấy list danh mục các gian hàng có tag là danh mục root đang chọn 
            $arrayIdChild = $this->getCategorieChildRoot($cate_id);
            //end lấy danh mục con của danh mục root_categorie_id
            // --------------------------------------
            $products = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->whereIn('products.categories_id',$arrayIdChild)->where('products.display',1)->where('products.name', 'like', '%' .$search_text.'%')->where('images_products.role',1)
            ->select('products.*', 'images_products.url AS avatar','products_detail.price AS maxPrice','products_detail.products_id')
            ->get();
            $productsGroup = $this->groupProduct($products);
            $products = $this->filterProduct($productsGroup);
            return view('front-end.page-content.product-search',['system'=>$system,'cates'=>$cates,'products'=>$products]);
        }
    }
    // end tìm kiếm bằng từ khóa trang root
    // -------------------------------------
    // tìm kiếm bằng từ khóa trên gian hàng
    public function businessSearchText($system_url, $cate_id, $cate_name, $search_text){
        if($cate_id ==0){
            $system = Systems::where('website',$system_url)->get()->first();
            $cates = Categories::where('systems_id',$system->id)->where('display',1)->get();
            $cate = $this->arrayColumn($cates,$col='id');
            $products = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->whereIn('products.categories_id',$cate)->where('products.display',1)->where('products.name', 'like', '%' .$search_text.'%')->where('images_products.role',1)
            ->select('products.*', 'images_products.url AS avatar','products_detail.price AS maxPrice','products_detail.products_id')
            ->get();
            $productsGroup = $this->groupProduct($products);
            $products = $this->filterProduct($productsGroup);
            return view('front-end.page-content.product-search',['system'=>$system,'cates'=>$cates,'products'=>$products]);
        }
        else{
            $system = Systems::where('website',$system_url)->get()->first();
            $cates = Categories::where('systems_id',$system->id)->where('display',1)->get();
            $arrayIdChildCategorie = array();
            $cate_taget = $this->getIdChildCategorieAllLevel($cate_id,$arrayIdChildCategorie);
            $cate_taget[count($cate_taget)] = $cate_id;
            $products = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->whereIn('products.categories_id',$cate_taget)->where('products.display',1)->where('products.name', 'like', '%' .$search_text.'%')->where('images_products.role',1)
            ->select('products.*', 'images_products.url AS avatar','products_detail.price AS maxPrice','products_detail.products_id')
            ->get();
            $productsGroup = $this->groupProduct($products);
            $products = $this->filterProduct($productsGroup);
            return view('front-end.page-content.product-search',['system'=>$system,'cates'=>$cates,'products'=>$products]);
        }
    }
    // end tìm kiếm bằng từ khóa trên gian hàng
    // ------------------------------
    // gom nhóm products_detail
    public static function groupProduct($products){
        $productsGroup = array();
        $i=0;
        foreach($products as $product){
            $check=0;
            foreach($productsGroup as $prg){
                if($product->products_id == $prg[0]->products_id){
                    $check=1;
                    break;
                }
            }
            if($check==0){
                $array = array();
                $k=0;
                $pr = $product;
                foreach($products as $prs){
                    if($prs->products_id==$pr->products_id){
                        $array[$k] = $prs;
                        $k++;
                    }
                }
                $productsGroup[$i] = $array;
                $i++;
            }
        }
        return $productsGroup;
    }
    // end gom nhóm products_detail
    // --------------------------------
    // lọc sản products_detail có giá cao nhất
    public static function filterProduct($productsGroup){
        $products =array();
        $i=0;
        foreach($productsGroup as $prg){
            $array = $prg[0];
            foreach($prg as $pr){
                if($pr->maxPrice>$array->maxPrice){
                    $array = $pr;
                }
            }
            $products[$i] = $array;
            $i++;
        }
        return $products;
    }
    // end lọc sản products_detail có giá cao nhất
    
    public static function countRate($feedback){
        $countRate = 0;
        foreach($feedback as $item){
            $countRate = $countRate + $item->rate;
        }
        return $countRate;
    }

    // trả về list danh mục của gian hàng thuộc danh mục cha root
    public function getCategorieChildRoot($cateRootId){
        $tag_categorie = TagCategories::where('root_categorie_id',$cateRootId)->get();
        $cate = array();
        $i=0;
        foreach($tag_categorie as $tag_cate){
            $cate[$i]=$tag_cate->categorie_id;
            $i++;
        }
        // -------------------------------------------
        // lấy danh mục con của danh mục root_categorie_id
        $arrayIdChild = array();
        foreach($cate as $cate_id){
            $arrayIdChildCategorie = array();
            $cate_taget = $this->getIdChildCategorieAllLevel($cate_id,$arrayIdChildCategorie);
            $cate_taget[count($cate_taget)] = $cate_id;

            // loại bỏ trùng lặp
            $cate_taget_final = array();
            $z=0;
            for($x =0;$x<count($cate_taget);$x++){
                $check =0;
                for($y =0;$y<count($arrayIdChild);$y++){
                    if($arrayIdChild[$y] == $cate_taget[$x]){

                    }
                    else{
                        $check++;
                    }
                }
                if($check == count($arrayIdChild)){
                    $cate_taget_final[$z] = $cate_taget[$x];
                    $z++;
                }
            }
            // end loại bỏ trùng lặp
            // -----------------------------------------
            $j=0;
            $count = count($arrayIdChild)+count($cate_taget_final);
            for($k =count($arrayIdChild);$k<$count;$k++){
                $arrayIdChild[$k] = $cate_taget_final[$j];
                $j++;
            }
        }
        return $arrayIdChild;
    }
    // end trả về list danh mục của gian hàng thuộc danh mục cha root
    public function test(){
        // $products_properties = ProductsProperties::where('products_detail_id',6);
        // $properties_id = $this->arrayColumn($products_properties,$col='properties_id');
        // $properties = Properties::join('properties_type','properties.properties_type_id','=','properties_type.id')->whereIn('properties.id',$properties_id)->select('properties.*','properties_type.name')->get();
        // $str = '';
        // foreach($properties as $pp){
        //     $str=$str.$pp->name;
        //     $str=$str.$pp->value;
        // }
        // dd($properties);
    }
    public function account($id){
        if(Auth::guard('users_client')->user()){
            if(Auth::guard('users_client')->user()->id == $id){
                $system = Systems::where('id',1)->get()->first();
                $menus = Menus::select()->orderBy('stt','ASC')->get();
                $cates = Categories::where('systems_id',$system->id)->where('display',1)->get();
                $cateRoot = array();
                $x = 0;
                for($i=0;$i<count($cates);$i++){
                    if($cates[$i]->id == $cates[$i]->parent_id){
                        $cateRoot[$x]=$cates[$i];
                        $x++;
                    }
                    else{}
                }
                $cates = $cateRoot;
                return view('front-end.page-content.checkout-status',['system'=>$system,'cates'=>$cates,'menus'=>$menus]);
            }
            else{
                return redirect()->route('account',Auth::guard('users_client')->user()->id);
            }
        }
        else{
            return redirect()->route('clientLogin')->with(['flash_level'=>'danger','flash_message'=>'Vui lòng đăng nhập']);
        }
    }
    public function order($id){
        if(Auth::guard('users_client')->user()){
            $order = Orders::where('id',$id)->get()->first();
            if($order->email == Auth::guard('users_client')->user()->email){
                $system = Systems::where('id',1)->get()->first();
                $cates = Categories::where('systems_id',$system->id)->where('display',1)->get();
                $cateRoot = array();
                $x = 0;
                for($i=0;$i<count($cates);$i++){
                    if($cates[$i]->id == $cates[$i]->parent_id){
                        $cateRoot[$x]=$cates[$i];
                        $x++;
                    }
                    else{}
                }
                $cates = $cateRoot;
                $order_details = OrdersDetail::where('orders_id',$order->id)->get();
                $order_details = $this->arrayColumn($order_details,$col='id');
                $order_details = OrdersDetail::join('products_detail', 'orders_detail.products_detail_id', '=', 'products_detail.id')->join('products', 'products_detail.products_id', '=', 'products.id')->whereIn('orders_detail.id',$order_details)->select('products_detail.*', 'orders_detail.amount AS amountOrder','products.name','products.url')->get();
                return view('front-end.page-content.order',['system'=>$system,'cates'=>$cates,'order'=>$order,'order_details'=>$order_details]);
                // dd($order_details);
            }
            else{
                return redirect()->route('account',Auth::guard('users_client')->user()->id);
            }
        }
        else{
            return redirect()->route('clientLogin')->with(['flash_level'=>'danger','flash_message'=>'Vui lòng đăng nhập']);
        }
    }
    public function cart(){
        
        $system = Systems::where('id',1)->get()->first();
        $menus = Menus::select()->orderBy('stt','ASC')->get();
        $cates = Categories::where('systems_id',$system->id)->where('display',1)->get();
        $cateRoot = array();
        $x = 0;
        for($i=0;$i<count($cates);$i++){
            if($cates[$i]->id == $cates[$i]->parent_id){
                $cateRoot[$x]=$cates[$i];
                $x++;
            }
            else{}
        }
        $cates = $cateRoot;
        
        return view('front-end.page-content.cart',['system'=>$system,'cates'=>$cates,'menus'=>$menus]);
        // dd($order_details);
            
    }
    public function checkout(){
        
        $items = Cart::getContent();
        $system = Systems::where('id',1)->get()->first();
        $menus = Menus::select()->orderBy('stt','ASC')->get();
        
        return view('front-end.page-content.checkout',['system'=>$system,'items'=>$items,'menus'=>$menus]);
        // dd($order_details);
            
    }
    public function checkProductDetail($id,$quantity){
        $product_detail = ProductsDetail::where('id',$id)->get()->first();
        if($product_detail->amount < $quantity){
            echo "không đủ hàng";
        }
        else if($quantity ==0){
            echo "không là gì cả";
        }
        else {
            echo "đủ hàng";
        }

    }
    public function checkAddToCart($url){
        // tách chuỗi từ url truyền về lấy ra mảng các thuộc tính của sản phẩm đặt hàng
        $string = $url;
        $start = 0;
        $array = array();
        $x=0;
        for($i=0;$i<strlen($string);$i++){
            if($string[$i] == '-'){
                $substr = substr($string,$start,$i-$start);
                $array[$x]=$substr;
                $x++;
                $start = $i + 1;
            }
            elseif($i == strlen($string)-1){
                $substr = substr($string,$start,$i-$start+1);
                $array[$x]=$substr;
            }
            else{}
        }
        //end tách chuỗi từ url truyền về lấy ra mảng các thuộc tính của sản phẩm đặt hàng
        // ------------------------------
        $products_id = $array[0];
        $quantity = $array[1];
        $properties_id = array();
        for($i=2;$i<count($array);$i++){
            $properties_id[$i-2] = $array[$i];
        }
        $products_detail = ProductsDetail::where('products_id',$products_id)->get();
        $products_detail_id = $this->arrayColumn($products_detail,$col='id');
        $products_detail_properties = ProductsProperties::whereIn('products_detail_id',$products_detail_id)->get();

        if(count($products_detail_properties) == 0){
            $products_detail = ProductsDetail::where('products_id',$products_id)->get()->first();
            if($products_detail->amount ==0){
                echo "hết hàng";
                $check2 =1;
            }
            elseif($products_detail->amount < $quantity){
                echo "không đủ hàng";
            }
            else{
                echo $products_detail->id.":còn hàng";

            }
        }
        else{

            $group_products_detail_properties = array();
            for($i=0;$i<count($products_detail_id);$i++){
                $x=0;
                for($j=0;$j<count($products_detail_properties);$j++){
                    if($products_detail_id[$i]==$products_detail_properties[$j]->products_detail_id){
                        $group_products_detail_properties[$i][$x]=$products_detail_properties[$j]->properties_id;
                        $x++;
                    }
                }

            }
            $check2 = 0;
            for($i=0;$i<count($group_products_detail_properties);$i++){
                if(count($properties_id)!=count($group_products_detail_properties[$i])){
                    echo "chưa chọn thuộc tính1";
                    $check2 =1;
                    break;
                }
                else{
                    $check =0;
                    for($j=0;$j<count($group_products_detail_properties[$i]);$j++){
                        for($k=0;$k<count($properties_id);$k++){
                            if($group_products_detail_properties[$i][$j] == $properties_id[$k]){
                                $check++;
                            }
                        }

                    }
                    if($check == count($group_products_detail_properties[$i])){
                        $products_detail = ProductsDetail::where('id',$products_detail_id[$i])->get()->first();
                        if($products_detail->amount ==0){
                            echo "hết hàng";
                            $check2 =1;
                        }
                        elseif($products_detail->amount < $quantity){
                            echo "không đủ hàng";
                            $check2 =1;
                        }
                        else{
                            echo $products_detail->id.":còn hàng";
                            $check2 =1;
                        }
                        break;
                    }
                }
            }
            if($check2 == 0){
                echo "hết hàng";
            }
            
        }
        
        // $products_detail = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->join('products_properties', 'products_properties.products_detail_id', '=', 'products_detail.id')->where('products.id',$products_id)->whereIn('products_properties.properties_id',$properties_id)->where('images_products.role',1)->select('products_detail.*','images_products.url AS avatar','products.name')->get();
        // dd($products_detail);

    }
    public function checkCountProperties($products_detail_id){
        $products_properties = ProductsProperties::where('products_detail_id',$products_detail_id)->get();
        echo count($products_properties);
    }
    public function addToCart($id,$quantity){
        // $products_detail = ProductsDetail::where('id',$id)->get()->first();
        $products_detail = Products::join('images_products', 'products.id', '=', 'images_products.products_id')->join('products_detail', 'products.id', '=', 'products_detail.products_id')->where('products_detail.id',$id)->where('images_products.role',1)->select('products_detail.*','images_products.url AS avatar','products.name','products.url')->get()->first();
        if($products_detail->amount >= $quantity && $quantity >0){
            Cart::add(array('id'=>$products_detail->id,'name'=>$products_detail->name,'quantity'=>$quantity,'price'=>$products_detail->sale,'attributes'=>array('img'=>$products_detail->avatar,'url'=>$products_detail->url)));
            // $products_detail = ProductsDetail::where('id',$id)->get()->first();
            // $products_detail->amount = $products_detail->amount - $quantity;
            // $products_detail->save();
            echo "cart::add";
            
        }
        else if($products_detail->amount >= $quantity && $quantity <0){
            Cart::update($products_detail->id, array(
              'quantity' => $quantity,
            ));
            echo "cart::update";
        }
        else if($quantity ==0){
            Cart::remove($products_detail->id);
            echo "cart::remove";
        }
        else {
            echo "không làm gì cả";
        }
    }
    public function removeCartItem($id){
        Cart::remove($id);
        echo "1";
    }
    public function getPriceProductDetail($url){
        $string = $url;
        $start = 0;
        $array = array();
        $x=0;
        for($i=0;$i<strlen($string);$i++){
            if($string[$i] == '-'){
                $substr = substr($string,$start,$i-$start);
                $array[$x]=$substr;
                $x++;
                $start = $i + 1;
            }
            elseif($i == strlen($string)-1){
                $substr = substr($string,$start,$i-$start+1);
                $array[$x]=$substr;
            }
            else{}
        }
        //end tách chuỗi từ url truyền về lấy ra mảng các thuộc tính của sản phẩm đặt hàng
        // ------------------------------
        $products_id = $array[0];
        $properties_id = array();
        for($i=1;$i<count($array);$i++){
            $properties_id[$i-1] = $array[$i];
        }
        $products_detail = ProductsDetail::where('products_id',$products_id)->get();
        $products_detail_id = $this->arrayColumn($products_detail,$col='id');
        $products_detail_properties = ProductsProperties::whereIn('products_detail_id',$products_detail_id)->get();

        if(count($products_detail_properties) == 0){
            $products_detail = ProductsDetail::where('products_id',$products_id)->get()->first();
            
            echo $products_detail->price.':'.$products_detail->amount;
        }
        else{

            $group_products_detail_properties = array();
            for($i=0;$i<count($products_detail_id);$i++){
                $x=0;
                for($j=0;$j<count($products_detail_properties);$j++){
                    if($products_detail_id[$i]==$products_detail_properties[$j]->products_detail_id){
                        $group_products_detail_properties[$i][$x]=$products_detail_properties[$j]->properties_id;
                        $x++;
                    }
                }

            }
            $check2 = 0;
            for($i=0;$i<count($group_products_detail_properties);$i++){
                $check =0;
                for($j=0;$j<count($group_products_detail_properties[$i]);$j++){
                    for($k=0;$k<count($properties_id);$k++){
                        if($group_products_detail_properties[$i][$j] == $properties_id[$k]){
                            $check++;
                        }
                    }

                }
                if($check == count($group_products_detail_properties[$i])){
                    $products_detail = ProductsDetail::where('id',$products_detail_id[$i])->get()->first();
                    $check2=1;
                    echo $products_detail->price.':'.$products_detail->amount;
                    
                }
                
            }
            if($check2 == 0){
                echo "0:hết hàng";
            }
            
        }

    }
    public function followSystem($system_id,$user_id){
        $follow = FollowSystems::where('users_clients_id',$user_id)->where('systems_id',$system_id)->get();
        if(count($follow) != 0){
            
        }
        else{
            $follow = new FollowSystems;
            $follow->users_clients_id =$user_id;
            $follow->systems_id = $system_id;
            $follow->save();
            
        }
        
    }
    public function unFollowSystem($system_id,$user_id){
        $follow = FollowSystems::where('users_clients_id',$user_id)->where('systems_id',$system_id)->get();
        $follow->delete();
    }
    public function checkFeedback($product_id,$user_id){
        $product_detail = ProductsDetail::where('products_id',$product_id)->get();
        $products_detail_id = $this->arrayColumn($product_detail,$col='id');
        $user= UsersClient::where('id',$user_id)->get()->first();
        $order_detail = OrdersDetail::join('products_detail','products_detail.id','=','orders_detail.products_detail_id')->join('orders','orders.id','=','orders_detail.orders_id')->whereIn('products_detail.id',$products_detail_id)->where('orders.email',$user->email)->select('orders_detail.*')->get();
        if(count($order_detail)==0){
            echo "chưa mua hàng";
        }
        else{
            echo "đã mua hàng";
        }

    }
    public function postAddOrder(Request $request){
        
        $cart = Cart::getContent();
        $order = new Orders;
        $order->addOrder($cart,$request);
        Cart::clear();
        if(Auth::guard('users_client')->user()){
            $id = Auth::guard('users_client')->user()->id;
            return redirect()->route('account',$id)->with(['flash_level'=>'success','flash_message'=>'đặt hàng thành công']);
        }
        else{
            return redirect()->back()->with(['flash_level'=>'success','flash_message'=>'đặt hàng thành công']);
        }

    }
    // public function orderStatus($id){
    //     $order = Orders::where('id',$id)->get()->first();
    //     $orders_line = OrdersDetail::where('order_id')
    // }
    public function postAddFeedback(Request $request){
        $feedback = Feedbacks::where('products_id',$request->product_id)->where('users_id',$request->user_id)->get();
        if(count($feedback) ==0){
            $feedback= new Feedbacks;
            $feedback->products_id = $request->product_id;
            $feedback->users_id = $request->user_id;
            $feedback->rate = $request->rate;
            $feedback->messages =$request->messages;
            $feedback->save();
            return redirect()->back();
        }
        else{
            $feedback = Feedbacks::where('products_id',$request->product_id)->where('users_id',$request->user_id)->get()->first();
            $feedback->rate = $request->rate;
            $feedback->messages =$request->messages;
            $feedback->save();
            return redirect()->back();
        }
        // dd($request->name);
    }
    public function postAddUserClient(addUserClientRequest $request){
        $user = new UsersClient;
        $user->addUser($request);
        $login = new LoginController;
        $login->loginWithRegister($request);
        return redirect()->back();
    }
}
