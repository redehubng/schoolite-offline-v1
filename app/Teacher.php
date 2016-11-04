<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    protected $table = 'teachers';
    protected $fillable = ['title','name','email','phone','dob',
                            'date_employed','date_left','staff_id',
                            'address','marital_status','salary','description',
                            'image','sex','status','country_id','state_id','lga_id','user_id',
    ];



    public function user(){
        return $this->belongsTo('App\User');
    }

    public function classrooms()
    {
        return $this->hasMany('App\Classroom', 'teacher_id', 'id');
    }

    public function levels()
    {
        return $this->hasMany('App\Level', 'teacher_id', 'id');
    }

    public function houses()
    {
        return $this->hasMany('App\House', 'teacher_id', 'id');
    }

    public function classroom_subjects()
    {
        return $this->hasMany('App\ClassroomSubject', 'teacher_id', 'id');
    }

    public function state(){
        return $this->belongsTo('App\State');
    }

    public function lga(){
        return $this->belongsTo('App\Lga');
    }
}
