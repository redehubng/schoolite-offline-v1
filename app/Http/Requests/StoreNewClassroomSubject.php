<?php

namespace App\Http\Requests;

use App\ClassroomSubject;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class StoreNewClassroomSubject extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(Request $request)
    {
        $classroom_subject = ClassroomSubject::where('classroom_id', '=', $request->classroom_id)
            ->where('subject_id', '=', $request->subject_id)->get()->count();

        if($classroom_subject !== 0){
            return false;
        }

        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'teacher_id' => 'integer|exists:teachers,id',
            'classroom_id' => 'required|integer|exists:classrooms,id',
            'subject_id' => 'required|integer|exists:subjects,id',
        ];
    }
}
