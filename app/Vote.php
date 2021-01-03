<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    protected $table = 'votes';
    protected $fillable = [
        'date','province_id','district_id','user_id','candidate_id','season_id'
    ];
    public function Season()
    {
        return $this->belongsTo('App\Season');
    }
    public function User()
    {
        return $this->belongsTo('App\User');
    }
    public function Province()
    {
        return $this->belongsTo('App\Province');
    }
    public function District()
    {
        return $this->belongsTo('App\District');
    }
    public function Candidate()
    {
        return $this->belongsTo('App\Candidate');
    }
}
