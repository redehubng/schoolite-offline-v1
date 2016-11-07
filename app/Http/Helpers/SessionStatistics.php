<?php


function term_percentage_done($session_id, $term){


    $classrooms_ids = array_unique(\App\Result::where('session_id', '=', $session_id)->where('term', '=', $term)->pluck('classroom_id')->toArray());

    $classrooms = \App\Classroom::find($classrooms_ids);

    $total_student_scores_count = 0;

    $scores_recorded = 0;

    $results = \App\Result::where('session_id', '=', $session_id)->where('term', '=', $term)->get();

    foreach($classrooms as $classroom){

        $total_student_scores_count += $results->where('classroom_id', '=', $classroom->id)->count();

    }

    dd($total_student_scores_count);


    if($total_student_scores_count == 0){
        return 0;
    }
    return round(($results->count() / $total_student_scores_count) * 100, 2);
}