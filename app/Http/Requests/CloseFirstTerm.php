<?php

namespace App\Http\Requests;

use App\Session;
use Illuminate\Foundation\Http\FormRequest;

class CloseFirstTerm extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        $session = Session::find($this->route('session_id'));


        if(isset($session) && !is_null($session) &&
            $session->first_term === 'active' &&
            $session->second_term === 'inactive' &&
            $session->third_term === 'inactive'){

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
            'session_id' => 'exists:sessions,id',
        ];
    }
}
