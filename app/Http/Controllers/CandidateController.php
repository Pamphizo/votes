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
}
