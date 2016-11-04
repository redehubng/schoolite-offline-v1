<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{

    protected $table = 'houses';

    protected $fillable = [
        'name', 'teacher_id'
    ];


    public function females(){
        return $this->students()->where('sex', '=', 'Female');
    }

    public function males(){
        return $this->students()->where('sex', '=', 'male');
    }

    public function teacher()
    {
        return $this->belongsTo('App\teacher');
    }

    public function students(){

        return $this->hasMany('App\Student');

    }

    public function total(){
        return $this->students()->count();
    }
}
