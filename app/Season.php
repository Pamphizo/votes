<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    protected $table = 'seasons';
    protected $fillable = [
        'period','start_date','end_date','status','reason'
    ];
    public function Candidate()
    {
        return $this->hasMany('App\Candidate','season_id');
    }
    public function Vote()
    {
        return $this->hasMany('App\Vote','season_id');
    }
}
