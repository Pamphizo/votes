<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\District;
use App\Province;
use App\Season;
use App\Vote;
use Carbon\Carbon;
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
    public function getCurrentElection(){
        $season=Season::where('status','=',true)->orderBy('id', 'DESC')->first();
        if ($season){
            return response()->json(['message' => "ok",'season'=>$season], 200);
        }else{
            $dat=Carbon::now();
            $season2=Season::where('status','=',false)->where('start_date','>',$dat)->orderBy('id', 'DESC')->first();
            if ($season2){
                $candidate=Candidate::with(['Province','District'])->where('season_id','=',$season2->id)->get();
                return response()->json(['message' => "upcoming",'season'=>$season2,'candidates'=>$candidate], 200);
            }else{
                $vote=Vote::with(['User','District',['Province']])->get();
                return response()->json(['message' => "last",'season'=>$season2,'vote'=>$vote], 200);

            }
        }
    }
    public function Vote(Request $request){

        $vote =new Vote();
        $vote->candidate_id=$request['candidate'];
        $vote->user_id=$request['user'];
        $vote->province_id=$request['province'];
        $vote->district_id=$request['district'];
        $vote->season_id=$request['season'];
        $vote->save();
        return response()->json(['message' => "ok",'vote'=>$vote], 200);
    }
    public function loadVoting(Request $request){
        $season=Season::where('status','=',true)->orderBy('id', 'DESC')->first();
        $vote=Vote::with(['User','District',['Province']])->get();
        return response()->json(['message' => "last",'vote'=>$vote], 200);

    }
}
