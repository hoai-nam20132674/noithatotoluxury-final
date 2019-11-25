<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function addUser($request){
        //user root tạo root_children
        if(Auth::user()->role && Auth::user()->id == Auth::user()->parent_id){
            $this->name = $request->name;
            $this->email = $request->email;
            $this->phone = $request->phone;
            $this->password = Hash::make($request->password);
            if($request->systems_id == Auth::user()->systems_id){
                $this->role = 0;
            }
            else{
                $this->role = 1;
            }
            $this->parent_id = Auth::user()->id;
            $this->systems_id = $request->systems_id;
            $this->save();
        }
        //end
        //user root children tạo user root khách hàng
        if(Auth::user()->role == 0 && $this->checkParentUser(Auth::user()->parent_id)){
            $this->name = $request->name;
            $this->email = $request->email;
            $this->phone = $request->phone;
            $this->password = Hash::make($request->password);
            $this->role = 1;
            $this->parent_id = Auth::user()->id;
            $this->systems_id = $request->systems_id;
            $this->save();
        }
        //end

        if(Auth::user()->role && Auth::user()->id != Auth::user()->parent_id){
            $this->name = $request->name;
            $this->email = $request->email;
            $this->phone = $request->phone;
            $this->password = Hash::make($request->password);
            $this->role = 0;
            $this->parent_id = Auth::user()->id;
            $this->systems_id = Auth::user()->systems_id;
            $this->save();
        }
        
    }
    public function checkParentUser($id) {
        $user = User::where('id',$id)->get()->first();
        if ($user->id == $user->parent_id) {
            return true;
        }
        else return flase;
    }
}
