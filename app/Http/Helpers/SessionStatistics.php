<?php


function term_percentage_done($session_id, $term){


    $classrooms = \App\Classroom::with(['subjects', 'students'])->get();

    $total_student_scores_count = 0;

    $scores_recorded = 0;

    $results = \App\Result::where('session_id', '=', $session_id)->where('term', '=', $term)->get()->count();

    foreach($classrooms as $classroom){

        $total_student_scores_count += $classroom->students->count() * $classroom->subjects->count();

    }


    return round(($results / $total_student_scores_count) * 100, 2);
}