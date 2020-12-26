<?php

namespace App\Http\Controllers;

use App\District;
use App\Province;
use Illuminate\Http\Request;

class MobileController extends Controller
{
    public function getProvince(){
        $prov=Province::all();
        return response()->json(['province' => $prov], 200);
    }
    public function getDistrict(){
        $dist=District::all();
        return response()->json(['district' => $dist], 200);
    }
    public function provinceDistrict($dist){
        $dist=District::where('province_id','=',$dist)->get();
        return response()->json(['district' => $dist], 200);
    }
}
