<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreNewGuardian extends FormRequest
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
            'email'         => 'required|email|unique:guardians,email',
            'phone'         => 'required|unique:guardians,phone',
            'guardian_id'   => 'required|unique:guardians,guardian_id',
            'address'       => 'required|min:10',
            'occupation'    => 'required',
            'sex'           => 'required|in:Male,Female',
            'user_id'       => 'integer|exists:users,id',
            'country_id'    => 'required|integer|exists:countries,id',
            'state_id'      => 'required|integer|exists:states,id',
            'lga_id'        => 'required|integer|exists:lgas,id',
            'image'         => 'mimes:jpeg,jpg,png|max:70|unique:guardians,image',
        ];
    }
}
