<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function mobileLogin(Request $request){
        if(is_numeric($request->get('email'))){
            $chekauth=Auth::attempt(['telephone' => $request->email, 'password' => $request->password]);
            if($chekauth){

                return response()->json(['login' => $chekauth,'user'=>Auth::user()], 200);

            }else{
                return response()->json(['login' => $chekauth,'user'=>$chekauth], 401);
            }
        }else{
            $checkauth2=Auth::attempt(['email' => $request->email, 'password' => $request->password]);
            if($checkauth2){

                return response()->json(['login' => $checkauth2,'user'=>Auth::user()], 200);


            }else{
                return response()->json(['login' => $checkauth2,'user'=>$checkauth2], 401);
            }

        }

    }

}
