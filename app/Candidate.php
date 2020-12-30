<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    protected $table = 'candidates';
    protected $fillable = [
        'name','dob','party','season_id','district_id','province_id',
        'strength','identity','logo','profile'
    ];
    public function Vote()
    {
        return $this->hasMany('App\Vote','candidate_id');
    }
    public function Province()
    {
        return $this->belongsTo('App\Province');
    }
    public function District()
    {
        return $this->belongsTo('App\District');
    }
    public function Season()
    {
        return $this->belongsTo('App\Season');
    }
}
