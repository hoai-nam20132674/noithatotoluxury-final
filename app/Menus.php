<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Categories;

class Menus extends Model
{
    //
    protected $table = 'menus';
    public function addMenu($request){
    	$menu=new Menus;
    	if($request->type ==0){
    		$menu->name = $request->name;
    		$menu->type = $request->type;
    		$menu->categories_id = $request->cate_id;
    		$menu->stt = $request->stt;
    		$menu->url = $request->url;
    		$menu->save();
    	}
    	else{
    		$menu->name = $request->name;
    		$menu->type = $request->type;
    		$cate = Categories::where('id',$request->cate_id)->get()->first();
    		$menu->categories_id = $request->cate_id;
    		$menu->stt = $request->stt;
    		$menu->url = $cate->url;
    		$menu->save();
    	}
    }
}
