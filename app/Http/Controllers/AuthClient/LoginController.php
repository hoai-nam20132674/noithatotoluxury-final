<?php

namespace App\Http\Controllers\AuthClient;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Socialite;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    protected function guard(){
        return Auth::guard('users_client');
    }

    // public function redirectToProvider()
    // {
    //     return Socialite::driver('facebook')->redirect();
    // }

    // public function handleProviderCallback()
    // {
    //     $user = Socialite::driver('facebook')->user();
    //     return $user->name;
    // }

    public function getLogin(){
        return view('auth_client.login');
    }

    public function postLogin(loginRequest $request){
        $login =array(
            'email'=>$request->email,
            'password'=>$request->password
        );
        if(Auth::guard('users_client')->attempt($login)){
            return redirect('/');
        }
        else{
            return redirect()->route('clientLogin')->with(['flash_level'=>'danger','flash_message'=>'Tài khoản hoặc mật khẩu không chính xác']);
        }
    
    }
    public function loginWithRegister($request){
        $login =array(
            'email'=>$request->email,
            'password'=>$request->password
        );
        if(Auth::guard('users_client')->attempt($login)){
            return redirect('/');
        }
        else{
            return redirect()->route('clientLogin')->with(['flash_level'=>'danger','flash_message'=>'Tài khoản hoặc mật khẩu không chính xác']);
        }
    
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
    
        $request->session()->flush();
    
        $request->session()->regenerate();
    
        return redirect('/');
    }
    public function checkLogin($email, $password){
        $login =array(
            'email'=>$email,
            'password'=>$password
        );
        if(Auth::guard('users_client')->attempt($login)){
            return 1;
        }
        else{
            return 0;
        }
    }
}
