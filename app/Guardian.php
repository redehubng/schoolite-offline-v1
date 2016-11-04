<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    protected $table = 'guardians';
    protected $fillable = ['title','name','email','phone','guardian_id',
        'address','occupation', 'user_id', 'image','sex','status','country_id','state_id','lga_id'
    ];


    public function wards(){
        return $this->hasMany('App\Student');
    }


}
