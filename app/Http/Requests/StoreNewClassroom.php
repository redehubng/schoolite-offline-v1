<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewClassroom extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'name' => 'required|unique:classrooms,name',
            'teacher_id' => 'required|exists:teachers,id',
            'level_id' => 'required|exists:levels,id',
            'first_term_charges' => 'required|numeric',
            'second_term_charges' => 'required|numeric',
            'third_term_charges' => 'required|numeric',
        ];
    }
}
