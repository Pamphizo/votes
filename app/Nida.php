<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nida extends Model
{
    protected $table = 'nidas';
    protected $fillable = [
        'province_id','district_id','name','biometric','nid','sex','dob','phone','profile'
    ];
}
