<?php


function expected_term_payment($session, $term){

    $classrooms = \App\Classroom::with('students')->get();

    $total = 0;

    foreach($classrooms as $classroom){
        $students_count = $classroom->students->where('status', '=', 'active')->count();

        if($students_count > 0){

            if($term == 'first'){
                $total += $classroom->first_term_charges * $students_count;
            }elseif($term == 'second'){
                $total += $classroom->second_term_charges * $students_count;
            }elseif($term == 'third'){
                $total += $classroom->third_term_charges * $students_count;
            }else{
                return  'N/A';
            }

        }

    }

    return $total;
}