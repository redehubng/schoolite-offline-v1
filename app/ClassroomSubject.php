<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClassroomSubject extends Model
{
    protected $table = 'classroom_subjects';

    protected $fillable = ['classroom_id', 'teacher_id', 'subject_id'];

    public function subject()
    {
        return $this->hasOne('App\Subject', 'id', 'subject_id');
    }
    public function teacher()
    {
        return $this->hasOne('App\Teacher', 'id', 'teacher_id');
    }
    public function classroom()
    {
        return $this->hasOne('App\Classroom', 'id', 'classroom_id');
    }
}
