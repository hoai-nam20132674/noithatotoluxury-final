<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Systems extends Model
{
    //
    protected $table = 'systems';
    public function addSystem($request){
    	$system = new Systems;
    	$system->name = $request->name;
		$system->logo ='';
		$system->shortcut_logo ='';
		$system->share_image ='';
		$system->title ='';
		$system->seo_description ='';
		$system->seo_keyword ='';
		$system->facebook ='';
		$system->instagram ='';
		$system->zalo ='';
		$system->youtube ='';
		$system->website = $request->website;
		$system->address ='';
		$system->phone ='';
		$system->email ='';
        $system->display = 1;
		$system->script ='';
        $system->highlights = 0;
        $system->save();
    }
}
