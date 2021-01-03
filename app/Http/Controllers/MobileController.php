<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\District;
use App\Province;
use App\Season;
use App\Vote;
use App\VoteResult;
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
            $candidate=Candidate::with(['Province','District'])->where('season_id','=',$season->id)->get();
            return response()->json(['message' => "active",'season'=>$season,'candidates'=>$candidate], 200);

        }else{
            $dat=Carbon::now();
            $season2=Season::where('status','=',false)->where('start_date','>',$dat)->orderBy('id', 'DESC')->first();
            if ($season2){
                $candidate=Candidate::with(['Province','District'])->where('season_id','=',$season2->id)->get();
                return response()->json(['message' => "upcoming",'season'=>$season2,'candidates'=>$candidate], 200);
            }else{
                $season3=Season::where('status','=',false)->where('start_date','<',$dat)->where('end_date','>',$dat)->orderBy('id', 'DESC')->first();
                if ($season3){
                    $candidate=Candidate::with(['Province','District'])->where('season_id','=',$season3->id)->get();

                    return response()->json(['message' => "suspend",'season'=>$season3,'candidates'=>$candidate], 200);

                }else {
                    $season4 = Season::where('status', '=', false)->where('end_date', '<', $dat)->orderBy('id', 'DESC')->first();
                    if ($season4) {
                        $candidate3 = Candidate::with(['Province', 'District'])->where('season_id', '=', $season4->id)->get();
                        return response()->json(['message' => "previous", 'season' => $season4, 'candidates' => $candidate3], 200);
                    }
                }
                return response()->json(['message' => "found"], 400);
            }
        }
    }
    public function Vote(Request $request){

        $che=Vote::where('user_id','=',$request['user'])
            ->where('season_id','=',$request['season'])
            ->first();
        if ($che){
            return response()->json(['message' => "voted"], 200);
        }

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
        $dat=Carbon::now();
        $season=Season::where('status','=',true)->orderBy('id', 'DESC')->first();
        $season2=Season::where('status','=',false)->where('end_date','>',$dat)->orderBy('id', 'DESC')->first();

        $data=[];
        $point=new VoteResult();
        $votes=Vote::with(['Candidate'])
            ->selectRaw('count(user_id) as points,candidate_id')
            ->groupBy('candidate_id')
            ->where('season_id','=',1)
            ->get();

        $count=0;

        $prov=Province::with(['Candidate'=> function($query) {
            $query->withCount(['Vote']);
        }])->get();
        $dis=District::with(['Candidate'=> function($query) {
            $query->withCount(['Vote']);
        }])->get();
        foreach ($votes as $vote){
            $vote->candidate_id=$vote->candidate->name;
        }
        return response()->json(['district'=>$dis,'province'=>$prov,'vote'=>$votes,'total_vote'=>$votes->count()], 200);
        foreach ($votes as $key=>$vote){
            $point->candidate=$vote->candidate;
            $pointaa=Vote::with(['Candidate'])
                ->selectRaw('count(user_id) as points,candidate_id')
                ->groupBy('candidate_id')
                ->where('season_id','=',1)
                ->where('candidate_id','=',$vote->candidate_id)
                ->get();
            $point->points=$pointaa->count();


            array_push($data,$point);
            array_push($data,$key);

        }



        $district=Vote::with(['District'])
            ->selectRaw('count(district_id) as pr,district_id')
            ->groupBy('district_id')
            ->where('season_id','=',1)
            ->where('candidate_id','=',1)
            ->get();

        return response()->json(['vote'=>$data], 200);
      return response()->json(['votess' => $votes,'vote'=>$point,'prov'=>$province,'dist'=>$district], 200);

    }

}
