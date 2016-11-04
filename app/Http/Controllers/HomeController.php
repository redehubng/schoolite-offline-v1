<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\RegisterController;
use App\Role;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
	


    /**
     * Create a new controller instance.
     *
     * @return void
     */

    use RegistersUsers;


    public function __construct()
    {
        $this->middleware('guest');
    }




    public function install(){
        return view('home.install');
    }

    public function setup(Request $request){
        

        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:users,username|email',
            'password' => 'required|confirmed|min:8',
        ]);

        if($validator->passes()){

            $user = User::create([
                'username'=>$request->username,
                'password'=>bcrypt($request->password)
            ]);

            event(new Registered($user));

            $user->addRole(Role::where('name', '=', 'admin')->first()->id);

            $this->guard()->login($user);

            return redirect('/');

        }



        redirect('install')->with('message', 'Something was not right');
    }



}
