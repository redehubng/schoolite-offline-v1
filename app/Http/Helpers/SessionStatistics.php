<?php


function term_percentage_done($session_id, $term){

    $classrooms = \App\Classroom::all();

    $total_students_scores_that_should_be_recorded = 0;

    foreach($classrooms as $classroom){
        $total_students_scores_that_should_be_recorded += $classroom->students()->where('status', '=', 'active')->orWhere('previous_classroom_id', '=', $classroom->id)->count() * $classroom->subjects()->count();

    }

    //dd($total_students_scores_that_should_be_recorded);


    $classrooms_with_results_ids = array_unique(\App\Result::where('session_id', '=', $session_id)->where('term', '=', $term)->pluck('classroom_id')->toArray());

    //dd($classrooms_with_results_ids);

    $classrooms_with_results = \App\Classroom::with('results')->find($classrooms_with_results_ids);


    $scores_recorded = 0;


    foreach($classrooms_with_results as $classroom){

        $scores_recorded += \App\Result::where('classroom_id', '=', $classroom->id)->where('session_id', '=', $session_id)->where('term', '=', $term)->get()->count();

    }


    $students = \App\Student::with(['classroom', 'results'])->get();
    $classrooms = \App\Classroom::with('subjects')->get();


//    foreach($students as $student){
//
//        foreach($classrooms as $classroom){
//            if($student->classroom_id == $classroom->id){
//
//                foreach($classroom->subjects as $subject){
//                    $results = $student->results()->where('subject_id', '=', $subject->id);
//                    while( $results->count() > 1){
//                        $results->first()->delete();
//                    }
//
//                }
//
//            }
//        }
//    }

//    var_dump($total_students_scores_that_should_be_recorded);
//    var_dump(\App\Result::all()->count());
//    dd($scores_recorded);

    if($scores_recorded == 0){
        return 0;
    }

    return round(($scores_recorded / $total_students_scores_that_should_be_recorded) * 100, 2);
}