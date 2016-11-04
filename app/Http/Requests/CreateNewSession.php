<?php

namespace App\Http\Requests;

use App\Session;
use Illuminate\Foundation\Http\FormRequest;

class CreateNewSession extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        $sessions = Session::all();
        foreach($sessions as $session){
            if($session->status == 'active'){
                return false;
            }
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
            'name' => 'required|unique:sessions,name',
        ];
    }
}
