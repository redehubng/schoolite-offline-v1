<?php

namespace App\Http\Requests;

use App\Session;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreStudentSubjectScore extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $session = Session::where('status', '=', 'active')->first();


        if(isset($session) && !is_null($session) && $request->term == $session->term() ){
        return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'student_id' => 'required|integer|exists:students,id',
            'subject_id' => 'required|integer|exists:subjects,id',
            'classroom_id' => 'required|integer|exists:classrooms,id',
            'teacher_id' => 'required|integer|exists:teachers,id',
            'session_id' => 'required|integer|exists:sessions,id',
            'term' => 'required|in:first,second,third',
            'first_ca' => 'integer|max:20',
            'second_ca' => 'integer|max:20',
            'exam' => 'integer|max:60',
        ];
    }
}
