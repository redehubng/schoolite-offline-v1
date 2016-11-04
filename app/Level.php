<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{

    protected $table = 'levels';

    protected $fillable = ['name', 'rank', 'teacher_id'];


    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }

    public function classes(){
        return $this->hasMany('App\Classroom');
    }
}
