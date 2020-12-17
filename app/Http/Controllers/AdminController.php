<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function getRegister(){
        $user=User::where('level',2)->first();
        if (!$user){
            return view('auth.adminRegister');
        }else{
            return view('auth.login');
        }

    }
    public function registerAdmin(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'telephone' => ['required', 'string', 'numeric', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],

        ]);
        if (!$validator){
            return $validator;
        }
        $user= User::create([
            'name' => $request['name'],
            'telephone' => $request['telephone'],
            'email' => $request['email'],
            'level' => 2,
            'password' => Hash::make($request['password']),
        ]);
        if ($user){
            return redirect('login');
        }else{
            return $user;
        }
    }
}
