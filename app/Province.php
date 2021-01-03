<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
    protected $fillable = [
        'name'
    ];
    public function Candidate()
    {
        return $this->hasMany('App\Candidate','province_id');
    }
    public function District()
    {
        return $this->hasMany('App\District','province_id');
    }
    public function Vote()
    {
        return $this->hasMany('App\Vote','province_id');
    }
    public function User()
    {
        return $this->hasMany('App\User','province_id');
    }
}
