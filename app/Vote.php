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
}
