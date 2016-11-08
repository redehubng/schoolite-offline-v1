<?php

namespace App\Http\Controllers;

use App\Classroom;
use App\Country;
use App\Guardian;
use App\House;
use App\Result;
use App\Session;
use App\Student;
use App\Teacher;
use Illuminate\Http\Request;

use App\Http\Requests;


class AdminController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
        //$this->middleware('admin');
    }
    public function dashboard(){
        $total_male_students = Student::where('status', '=', 'active')->where('sex', '=', 'Male')->count();
        $total_female_students = Student::where('status', '=', 'active')->where('sex', '=', 'Female')->count();
        $total_students = $total_female_students + $total_male_students;

        $total_male_teachers = Teacher::where('status', '=', 'active')->where('sex', '=', 'Male')->count();
        $total_female_teachers = Teacher::where('status', '=', 'active')->where('sex', '=', 'Female')->count();
        $total_teachers = $total_female_teachers + $total_male_teachers;

        return view('admin.dashboard')->with('total_male_students', $total_male_students)
            ->with('total_female_students', $total_female_students)->with('total_students', $total_students)->with('total_male_teachers', $total_male_teachers)
            ->with('total_female_teachers', $total_female_teachers)->with('total_teachers', $total_teachers);
    }


    public function showStudent($student_id){

        $houses = House::all();
        $classrooms = Classroom::all();
        $guardians = Guardian::where('status', '=', 'active')->get();
        $countries = Country::all();

        $student = Student::with('results', 'classroom', 'guardian', 'house')->where('id', '=', $student_id)->firstOrFail();

        $session_ids = array_unique(Result::where('student_id', '=', $student_id)->pluck('session_id')->toArray());

        $sessions = Session::find($session_ids);


        return view('admin.student')
            ->with('student', $student)
            ->with('sessions', $sessions)
            ->with('houses', $houses)
            ->with('classrooms', $classrooms)
            ->with('guardians', $guardians)
            ->with('countries', $countries);


    }

    public function showStudentResult($student_id, $session_id){

        $student = Student::with('results')->findOrFail($student_id);
        $first_term_results = $student->results()->where('session_id', '=', $session_id)->where('term', '=', 'first')->get();
        $second_term_results = $student->results()->where('session_id', '=', $session_id)->where('term', '=', 'second')->get();
        $third_term_results = $student->results()->where('session_id', '=', $session_id)->where('term', '=', 'third')->get();

        $classroom = $first_term_results->first()->classroom;
        $r_session = $first_term_results->first()->session;


        return view('admin.view_student_result', compact(['first_term_results', 'second_term_results', 'third_term_results', 'classroom', 'student', 'r_session']));

    }

    public function updateStudentResult(Requests\AdminUpdateStudentResult $request, $student_id, $session_id){

        $result = Result::find($request->result_id);

        $result->first_ca = $request->first_ca;
        $result->second_ca = $request->second_ca;
        $result->exam = $request->exam;

        $result->save();

        $score = [];
        $score['first_ca'] = $result->first_ca;
        $score['second_ca'] = $result->second_ca;
        $score['exam'] = $result->exam;
        $score['total'] = $result->total();
        $score['grade'] = $result->grade();
        $score['position'] = $result->position();

        return $score;

    }



    public function promoteStudent(Requests\PromoteStudent $request, $student_id){

    }

    public function promoteAllStudent(Requests\PromoteAllStudent $request, $classroom_id){

    }

    public function repeatStudent(Requests\RepeatStudent $request, $student_id){

    }

    public function repeatAllStudent(Requests\RepeatAllStudent $request, $classroom_id){

    }

    public function showResults(Request $request){


        $results = Result::with('classroom', 'session', 'student', 'teacher', 'subject');


        if(isset($request->session_id) && !is_null($request->session_id) && $request->session_id !== 'All'){

            $results = $results->where('session_id', '=', $request->session_id);
        }

        if(isset($request->term) && !is_null($request->term)){
            $results = $results->where('term', '=', $request->term);
        }

        if(isset($request->classroom_id) && !is_null($request->classroom_id)){
            $results = $results->where('classroom_id', '=', $request->classroom_id);
        }

        if(isset($request->teacher_id) && !is_null($request->teacher_id)){
            $results = $results->where('teacher_id', '=', $request->teacher_id);
        }

        if(isset($request->student_id) && !is_null($request->student_id)){
            $results = $results->where('student_id', '=', $request->student_id);
        }

        if(isset($request->subject_id) && !is_null($request->subject_id)){
            $results = $results->where('subject_id', '=', $request->subject_id);
        }

        return view('admin.scores_sheet')->with('results', $results->get());

    }

}
