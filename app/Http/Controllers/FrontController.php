<?php

namespace App\Http\Controllers;

use App\Season;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function activeSeason(){
        return Season::where('status',true)->first();
    }
}
