<?php


function position($scores_array, $score){

    rsort($scores_array);

    $scores_array = array_unique($scores_array);

    arsort($scores_array);

    if(in_array($score, $scores_array)){
        return array_keys($scores_array, $score)[0] + 1;
    }else{
        return 'N/A';
    }
}

function classroom_percentages($classroom_id, $session_id, $term){

    $percentages = [];

    $students_ids = array_unique(\App\Result::where('classroom_id', '=', $classroom_id)->where('session_id', '=', $session_id)->where('term', '=', $term)->pluck('student_id')->toArray());

    $students = \App\Student::find($students_ids);

    if($term == 'third'){
        foreach($students as $student){
            $percentages[] = $student->third_term_percentage($student->results()->where('session_id', '=', $session_id)->where('term', '=', $term)->get());
        }
    }else{
        foreach($students as $student){
            $percentages[] = $student->term_percentage($student->results()->where('session_id', '=', $session_id)->where('term', '=', $term)->get());
        }
    }


    return $percentages;

}

function class_teacher_remark($average){
    return "";
}

function head_teacher_remark($average){
    return $average;
}

function house_master_remark($average){
    return 0;
}
