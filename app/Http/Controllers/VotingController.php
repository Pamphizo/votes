<?php

namespace App\Http\Controllers;

use App\Candidate;
use App\Province;
use App\Season;
use App\Vote;
use App\VoteResult;
use Carbon\Carbon;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    public  $pp;
    public function getVoteStatus(){

        $dat=Carbon::now();
        $status=Season::where('status','=',true)->orderBy('id', 'DESC')->first();
        if ($status){
            $candidate=Candidate::with(['Province','District'])->where('season_id','=',$status->id)->get();
            return response()->json(['message' => "active",'season'=>$status,'candidates'=>$candidate], 200);

        }else{
            $season2=Season::where('status','=',false)->where('start_date','>',$dat)->orderBy('id', 'DESC')->first();
            if ($season2){
                $candidate=Candidate::with(['Province','District'])->where('season_id','=',$season2->id)->get();
//                return $candidate;
                return response()->json(['message' => "upcoming",'season'=>$season2,'candidates'=>$candidate], 200);
            }else{
                $season3=Season::where('status','=',false)->where('start_date','<',$dat)
                    ->where('end_date','>',$dat)->orderBy('id', 'DESC')->first();
                if ($season3){
                    $candidate=Candidate::with(['Province','District'])->where('season_id','=',$season3->id)->get();
//                return $candidate;
                    return response()->json(['message' => "suspend",'season'=>$season3,'candidates'=>$candidate], 200);

                }else{
                    $season4=Season::where('status','=',false)->where('end_date','<',$dat)->orderBy('id', 'DESC')->first();
                if ($season4){
                    $candidate=Candidate::with(['Province','District'])->where('season_id','=',$season4->id)->get();
//                return $candidate;
                    return response()->json(['message' => "previous",'season'=>$season4,'candidates'=>$candidate], 200);

                }
                }
                $sea=new Season();
                $can=new Candidate();
                return response()->json(['message' => "found",'season'=>$sea,'candidates'=>$can], 200);

            }
        }
    }
    public function voteStatistic(){

        $dat=Carbon::now();
        $vv=new VoteResult();
        $season=Season::where('status','=',true)->orderBy('id', 'DESC')->first();
        if ($season){
            $votes=Vote::with(['Candidate'])
                ->selectRaw('count(user_id) as points,candidate_id')
                ->groupBy('candidate_id')
                ->where('season_id','=',$season->id)
                ->get();
            foreach ($votes as $vote){
                $vote->candidate_id=$vote->candidate->name;
            }
            return response()->json(['state'=>"ok",'message' => "active",'votes'=>$votes], 200);


        }else{
            $season2=Season::where('status','=',false)->where('end_date','<',$dat)->orderBy('id', 'DESC')->first();
            if ($season2){
                $votes=Vote::with(['Candidate'])
                    ->selectRaw('count(user_id) as points,candidate_id')
                    ->groupBy('candidate_id')
                    ->where('season_id','=',$season2->id)
                    ->get();
                foreach ($votes as $vote){
                    $vote->candidate_id=$vote->candidate->name;
                }
                return response()->json(['state'=>"ok",'message' => "previous",'votes'=>$votes], 200);
            }else{
                return response()->json(['state'=>"not",'message' => "upcoming",'votes'=>$vv], 200);

            }

        }

    }
    public function voteResultPage(){
        $votes=Vote::with(['Candidate'])
            ->selectRaw('count(user_id) as points,candidate_id')
            ->groupBy('candidate_id')
            ->where('season_id','=',1)
            ->get();
        foreach ($votes as $vote){
            $vote->candidate_id=$vote->candidate->name;
        }
        return view('voteResult',['votes'=>$votes]);
    }
    public function gettest(){
        $dat=Carbon::now();
        $season=Season::where('status','=',true)->orderBy('id', 'DESC')->first();
        if ($season){
            $votes=Vote::with(['Candidate'])
                ->selectRaw('count(user_id) as points,candidate_id')
                ->groupBy('candidate_id')
                ->where('season_id','=',$season->id)
                ->get();
            foreach ($votes as $vote){
                $vote->candidate_id=$vote->candidate->name;
            }
            $data=[];
            $point=new VoteResult();
            $provs=Province::all();
            foreach ($provs as $prov){
                $candids=Candidate::where('season_id','=',$season->id)->get();
                foreach ($candids as $candid){
                    $point->candidate=$candid->name;
                    $pp=Vote::where('candidate_id','=',$candid->id)
                        ->where('province_id','=',$prov->id)
                        ->where('season_id','=',$season->id)
                        ->get();
                    $point->province_point=$pp->count();
                    array_push($data,$point);
                }




            }

            return response()->json(['state'=>"ok",'message' => "active",'votes'=>$votes,'province'=>$data], 200);
        }else{
            $season2=Season::where('status','=',false)->where('end_date','>',$dat)->orderBy('id', 'DESC')->first();

        }
    }
    public function getWinner(){
        $dat=Carbon::now();
        $season2=Season::where('status','=',false)->where('end_date','<',$dat)->orderBy('id', 'DESC')->first();
        if ($season2){
            $votes=Vote::with(['Candidate'])
                ->selectRaw('count(user_id) as points,candidate_id')
                ->groupBy('candidate_id')
                ->where('season_id','=',$season2->id)
                ->get();
            $dd=$votes->max('points');

            $this->pp=$dd;
            $filter = $votes->filter(function($value, $key) {

                if ($value['points'] == $this->pp) {
                    return true;
                }
            });

            $filter->all();
            return $filter;
        }
    }
}
