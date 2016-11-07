<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'students';

    protected $fillable = ['admin_number', 'user_id', 'name', 'email', 'sex', 'dob', 'phone', 'address', 'state_id', 'lga_id', 'classroom_id', 'house_id', 'guardian_id', 'starting_classroom_id', 'country_id', 'date_admitted'];

    protected $dates = ['created_at', 'updated_at', 'dob'];

    public function classroom()
    {
        return $this->belongsTo('App\Classroom', 'classroom_id', 'id');
    }


    /**
     * Get all classrooms a student has results for
     *
     * @return Classrom objects
     */
    public function classrooms(){

        $classrooms_ids = array_unique(Result::where('student_id', '=', $this->id)->pluck('classroom_id')->toArray());

        $classrooms =  Classroom::find($classrooms_ids);

        return $classrooms;
    }


    /**
     * get all sessions a students has results for
     *
     * @return Session objects
     */
    public function sessions(){

        $session_ids = array_unique(Result::where('student_id', '=', $this->id)->pluck('session_id')->toArray());

        $sessions =  Session::find($session_ids);

        return $sessions;
    }

    /**
     * get students results for a particular classroom for a particular session
     *
     * @param $classroom
     * @param $session_id
     * @return Result collection
     */
    public function classroom_results($classroom_id, $session_id, $term = null){

        if($term === null){
            return Result::where('classroom_id', '=', $classroom_id)->where('session_id', '=', $session_id)->get();
        }elseif($term === 'first' || $term === 'second' || $term === 'third'){
            return Result::where('classroom_id', '=', $classroom_id)->where('session_id', '=', $session_id)->where('term', '=', $term)->get();
        }

        return Result::where('classroom_id', '=', $classroom_id)->where('session_id', '=', $session_id)->get();

    }

    public function session_classroom($session_id){

        $session_classroom_id = Result::where('student_id', '=', $this->id)->where('session_id', '=', $session_id)->pluck('classroom_id')->first();

        return $session_classroom = Classroom::find($session_classroom_id);
    }


    public function previous_classroom()
    {
        return $this->belongsTo('App\Classroom', 'previous_classroom_id', 'id');
    }

    public function results(){
        return $this->hasMany('App\Result');
    }


    public function session_results($session_id){
        return $this->results()->where('session_id', '=', $session_id)->get();
    }

    public function term_results($session_id, $term){
        return $this->session_results($session_id)->where('term', '=', $term);
    }

    public function first_term_results($session_id){
        return $this->term_results($session_id, 'first');
    }

    public function second_term_results($session_id){
        return $this->term_results($session_id, 'second');
    }

    public function third_term_results($session_id){
        return $this->term_results($session_id, 'third');
    }





    public function first_term_position($session_id = null){

        if($session_id === null){
            $session_id = Session::where('status', '=', 'active')->firstOrFail()->pluck('id');
        }

        $percentages = classroom_percentages($this->first_term_results($session_id)->first()->classroom_id, $session_id, 'first');


        $first_term_results = $this->first_term_results($session_id);

        return position($percentages, $this->term_percentage($first_term_results));

    }

    public function second_term_position($session_id = null){

        if($session_id === null){
            $session_id = Session::where('status', '=', 'active')->firstOrFail()->pluck('id');
        }

        $percentages = classroom_percentages($this->second_term_results($session_id)->first()->classroom_id, $session_id, 'second');

        $second_term_results = $this->second_term_results($session_id);

        if($second_term_results->count() > 0 && count($percentages) > 0) {
            return position($percentages, $this->term_percentage($second_term_results));
        }else{
            return 'N/A';
        }

    }


    public function third_term_position($session_id = null){

        if($session_id === null){
            $session_id = Session::where('status', '=', 'active')->firstOrFail()->pluck('id');
        }

        $percentages = classroom_percentages($this->third_term_results($session_id)->first()->classroom_id, $session_id, 'third');

        $third_term_results = $this->third_term_results($session_id);

        if($third_term_results->count() > 0 && count($percentages) > 0) {
            return position($percentages, $this->third_term_percentage($third_term_results));
        }else{
            return 'N/A';
        }

    }


    public function term_percentage($term_result){

        $total_score = 0;

        $total_subject = $term_result->count();

        foreach($term_result as $result){
            $total_score += $result->first_ca + $result->second_ca + $result->exam;
        }

        return $total_subject == 0 ? 'no subject' :(double)($total_score / $total_subject);

    }

    public function third_term_percentage($third_term_result){
        $total_score = 0;

        $total_subject = $third_term_result->count();

        foreach($third_term_result as $result){
            $total_score += $result->first_term_total() + $result->second_term_total() +  $result->total();
        }

        return $total_subject == 0 ? 'no subject' :(double)($total_score / ($total_subject * 3));
    }


    public function guardian(){
        return $this->belongsTo('App\Guardian');
    }

    public function house(){
        return $this->belongsTo('App\House');
    }

    public function state(){
        return $this->belongsTo('App\State');
    }

    public function lga(){
        return $this->belongsTo('App\Lga');
    }

    public function student_subject_session_term_result($subject_id, $session_id, $term){
        return $this->results()->where('subject_id', '=', $subject_id)->where('session_id', '=', $session_id)->where('term', '=', $term)->first();
    }


}
