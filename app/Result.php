<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Result extends Model
{
    protected $fillable = ['student_id', 'classroom_id', 'teacher_id', 'subject_id', 'session_id', 'first_ca', 'second_ca', 'exam', 'term'];

    public function total(){
        return (isset($this) && !is_int($this)) ?  $this->first_ca + $this->second_ca + $this->exam : 'N/A';
    }

    public function first_term_total(){
        $result = Result::where('session_id', '=', $this->session_id)->where('subject_id', '=', $this->subject_id)->where('term', '=', 'first')->firstOrFail();

        return (isset($result) && !is_int($result)) ?  $result->first_ca + $result->second_ca + $result->exam : 'N/A';
    }

    public function second_term_total(){
        $result = Result::where('session_id', '=', $this->session_id)->where('subject_id', '=', $this->subject_id)->where('term', '=', 'second')->firstOrFail();

        return (isset($result) && !is_int($result)) ?  $result->first_ca + $result->second_ca + $result->exam : 'N/A';
    }

    public function grade(){
        if(isset($this) && !is_null($this)){

            if($this->total() >= 70) return 'A';
            if($this->total() >= 60) return 'B';
            if($this->total() >= 50) return 'C';
            if($this->total() >= 45) return 'D';
            if($this->total() >= 40) return 'E';

            return 'F';

        }else{
            return 'N/A';
        }
    }


    public function position(){

//        $score_position = [];

        if(isset($this) && !is_null($this)){

            $subject_scores = array_flatten($this->this_term_class_subject_scores());

            rsort($subject_scores);

            $subject_scores = array_unique($subject_scores);

            arsort($subject_scores);


            return array_keys($subject_scores, $this->total())[0] + 1;


        }

    }

    public function this_term_class_subject_scores(){
        if(isset($this) && !is_null($this)){
            $subject_scores = Result::where('session_id', $this->session_id)
                ->where('classroom_id', '=', $this->classroom_id)
                ->where('subject_id', '=', $this->subject_id)
                ->where('term', '=', $this->term)
                ->where('teacher_id', '=', $this->teacher_id)->select( DB::raw('first_ca + second_ca + exam as score'))->orderBY('score', 'desc')->get()->toArray();
            return $subject_scores;

        }

        return 'N/A';
    }

    public function classroom_students_count(){
        return count(array_unique(Result::where('classroom_id', '=', $this->classroom_id)->where('session_id', '=', $this->session_id)->pluck('student_id')->toArray()));
    }

    public function subject(){
        return $this->belongsTo('App\Subject');
    }

    public function student(){
        return $this->belongsTo('App\Student');
    }

    public function teacher(){
        return $this->belongsTo('App\Teacher');
    }

    public function remark(){
        if(isset($this) && !is_null($this)){

            if($this->grade() == 'A') return 'Excellent';
            if($this->grade() == 'B') return 'V.Good';
            if($this->grade() == 'C') return 'Good';
            if($this->grade() == 'D') return 'Fair';
            if($this->grade() == 'E') return 'Poor';
            if($this->grade() == 'F') return 'Fail';

            return 'N/A';

        }else{
            return 'N/A';
        }
    }

    public function classroom(){
        return $this->belongsTo('App\Classroom');
    }

    public function session(){
        return $this->belongsTo('App\Session');
    }



}
