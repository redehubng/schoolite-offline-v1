<?php

namespace App\Http\Requests;

use App\Result;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUpdateStudentResult extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        if(Auth::user()->isAdmin()) {
            $result = Result::find($request->result_id);
            if ($result) {
                return true;
            }
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
            'result_id' => 'bail|required|exists:results,id',
            'student_id' => 'bail|required|integer|exists:students,id',
            'subject_id' => 'bail|required|integer|exists:subjects,id',
            'classroom_id' => 'bail|required|integer|exists:classrooms,id',
            'teacher_id' => 'bail|required|integer|exists:teachers,id',
            'session_id' => 'bail|required|integer|exists:sessions,id',
            'term' => 'bail|required|in:first,second,third',
            'first_ca' => 'bail|integer|max:20',
            'second_ca' => 'bail|integer|max:20',
            'exam' => 'bail|integer|max:60',
        ];
    }
}
