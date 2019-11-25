<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Input;
use App\ImageShare;
use Illuminate\Support\Facades\Auth;

class Categories extends Model
{
    //
    protected $table = 'categories';
    public function addCategorie($request){
    	$cate = new Categories;
    	$cate->name = $request->name;
        $cate->url = $request->url;
        $cate->seo_description = $request->seo_description;
        $cate->seo_keyword = $request->seo_keyword;
        $cate->title = $request->title;
        $cate->parent_id = $request->parent_id;
        $cate->systems_id = Auth::user()->systems_id;
        $file = Input::file('image_share');
        $file_name = $file->getClientOriginalName();
        $file->move('uploads/images/categories/share_image/',$file_name);
        $cate->share_image=$file_name;
        $avatar = Input::file('avatar');
        $ava_name = $avatar->getClientOriginalName();
        $avatar->move('uploads/images/categories/avatar/',$ava_name);
        $cate->avatar = $ava_name;
        $cate->display = $request->display;
        $cate->highlights = $request->highlights;
        $cate->save();
        $img_share = new ImageShare;
        $img_share->url = $file_name;
        $img_share->save();
        if($cate->parent_id == 0){
        	$cate->parent_id = $cate->id;
        	$cate->save();
        }
    }
}
