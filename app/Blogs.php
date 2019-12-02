<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;

class Blogs extends Model
{
    //
    protected $table = 'blogs';
    public function addBlog($request){
		$file_name = $request->file('image')->getClientOriginalName();
		$blog = new Blogs;
		$blog->title= $request->title;
		$blog->content =$request->content;
		$blog->user_id = Auth::user()->id;
		$blog->seo_keyword =$request->seo_keyword;
		$blog->seo_description=$request->seo_description;
		$blog->url=$request->url;
		$blog->display=$request->display;
		$blog->image =$file_name;
		$blog->view = 0;
		$request->file('image')->move('uploads/images/blogs/',$file_name);
		$blog->save();
	}
	public function editBlog($request,$id){
		$blog = Blogs::where('id',$id)->get()->first();
		$blog->title= $request->title;
		$blog->content =$request->content;
		$blog->seo_keyword =$request->seo_keyword;
		$blog->seo_description=$request->seo_description;
		$blog->url=$request->url;
		$blog->display=$request->display;
		if(Input::hasFile('image')){ 
            $file_name = $request->file('image')->getClientOriginalName();
            $blog->image = $file_name;
            $request->file('image')->move('uploads/images/blogs/',$file_name); 
        }
        $blog->save();
	}
}
