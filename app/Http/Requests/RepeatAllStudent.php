<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RepeatAllStudent extends FormRequest
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
            'repeated_to_classroom_id' => 'required|integer|min:1|exists:classrooms,id'
        ];
    }
}
