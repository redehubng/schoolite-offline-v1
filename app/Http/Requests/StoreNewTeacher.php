<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewTeacher extends FormRequest
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
            'title'         => 'required|in:Mr,Miss,Mrs,Dr,Prof',
            'first_name'    => 'required|min:3',
            'middle_name'   => 'nullable',
            'surname'       => 'required|min:3',
            'email'         => 'required|email|unique:teachers,email',
            'phone'         => 'required|unique:teachers,phone',
            'dob'           => 'required|date',
            'date_employed' => 'required|date',
            'staff_id'      => 'required|unique:teachers,staff_id',
            'address'       => 'required|min:10',
            'marital_status'=> 'required|in:Married,Single,Other',
            'salary'        => 'required|numeric',
            'description'   => 'required|min:10',
            'sex'           => 'required|in:Male,Female',
            'user_id'       => 'integer|exists:users,id',
            'country_id'    => 'required|integer|exists:countries,id',
            'state_id'      => 'required|integer|exists:states,id',
            'lga_id'        => 'required|integer|exists:lgas,id',
            'image'         => 'required|mimes:jpeg,jpg,png|max:70|unique:teachers,image',
        ];
    }
}
