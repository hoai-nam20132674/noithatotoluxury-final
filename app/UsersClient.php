<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UsersClient extends User
{
    //
    protected $table = 'users_clients';
    public function addUser($request){
    	$user = new UsersClient;
    	$user->name =$request->name;
    	$user->phone =$request->phone;
    	$user->email =$request->email;
    	$user->password = Hash::make($request->password);
    	$user->save();
    }
}
