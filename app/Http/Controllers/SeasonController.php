<?php

namespace App\Http\Controllers;

use App\Province;
use App\Season;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SeasonController extends Controller
{
    public function season(){
        if (Auth::check()){
            return view('backend.pages.season');
        }else{
            return view('welcome');
        }

    }
    public function getSeason(){
        if (Auth::check()){
            $seas=Season::all();
            return response()->json(['season' => $seas], 200);
        }else{
            return view('welcome');
        }
    }
    public function saveSeason(Request $request){
        $seas=new Season();
        $seas->period=$request['period'];
        $seas->start_date=$request['date1'];
        $seas->end_date=$request['date2'];
        $seas->reason=$request['reason'];
        $seas->save();
        return response()->json(['season' => 'ok'], 200);

    }
    public function show($id){
        $seas=Season::find($id);
        if ($seas){
            return response()->json(['season' => $seas], 200);
        }
    }
    public function updateSeason(Request $request){
        $seas=Season::find($request['id']);
        if ($seas){
            $seas->period=$request['period'];
            $seas->start_date=$request['date1'];
            $seas->end_date=$request['date2'];
            $seas->reason=$request['reason'];
            $seas->save();
            return response()->json(['season' => 'ok'], 200);
        }
    }
    public function delete($id){
        $seas=Season::find($id);
        if ($seas){
            $seas->delete();
            return response()->json(['season' => 'ok'], 200);
        }
    }
    public function seasonCandidate($season){
        if (Auth::check()){
            return view('backend.pages.candidate');
        }else{
            return view('welcome');
        }
    }
}
