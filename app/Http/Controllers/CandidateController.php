<?php

namespace App\Http\Controllers;

use App\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    public function saveCandidate(Request $request){
        $file=$request->file('photo');
        $filename =time().$file->getClientOriginalName();
        $file->move(public_path('backend/candidates'),$filename);

        $file1=$request->file('logo');
        $filename1 =time().$file->getClientOriginalName();
        $file1->move(public_path('backend/logos'),$filename1);

        $candidate=new Candidate();
        $candidate->province_id=$request['province'];
        $candidate->district_id=$request['district'];
        $candidate->season_id=$request['season'];
        $candidate->name=$request['name'];
        $candidate->identity=$request['nid'];
        $candidate->dob=$request['dob'];
        $candidate->profile=$filename;
        $candidate->logo=$filename1;
        $candidate->party=$request['party'];
        $candidate->strength=$request['strength'];
        $candidate->save();

        return response()->json(['candidate' => "ok"], 200);
    }
    public function delete($id){
        $pop=Candidate::find($id);
        if ($pop){
            $pop->delete();
            return response()->json(['candidate' => 'ok'], 200);
        }
    }
    public function show($id){
        $pop=Candidate::find($id);
        if ($pop){
            return response()->json(['candidate' => $pop], 200);
        }
    }
    public function updateCandidate(Request $request){
        $cand=Candidate::find($request['id']);
        if ($cand){
            $cand->name=$request['name'];
            $cand->identity=$request['identity'];
            $cand->dob=$request['dob'];
            $cand->party=$request['party'];
            $cand->strength=$request['strength'];
            $cand->save();
            return response()->json(['candidate' => 'ok'], 200);
        }
        return response()->json(['candidate' => 'found'], 404);
    }
    public function candidateDetail($id){

    }
}
