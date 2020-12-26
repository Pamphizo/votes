<?php

namespace App\Http\Controllers;

use App\Nida;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PopulationController extends Controller
{
    public function nida(){
        if (Auth::check()){
            return view('backend.pages.nidaList');
        }else{
            return view('welcome');
        }
    }
    public function getNidaList(){
        if (Auth::check()){
         $list=Nida::with(['District'])->get();
            return response()->json(['lists' => $list], 200);
        }else{
            return view('welcome');
        }
    }
    public function population(){
        if (Auth::check()){
            return view('backend.pages.registeration');
        }else{
            return view('welcome');
        }
    }
    public function getRegisteration(){
        if (Auth::check()){
            $list=User::with(['District','Province'])
                ->where('level',"=",1)
                ->get();
            return response()->json(['populations' => $list], 200);
        }else{
            return view('welcome');
        }
    }

}
