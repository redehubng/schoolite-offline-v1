<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;

use App\Http\Requests;

class SessionController extends Controller
{
    public function index(){
        $sessions = Session::all();
        return view('session.index')->with('sessions', $sessions);
    }


    public function store(Requests\CreateNewSession $request){

        Session::create([
           'name' => $request->name,
           'status' => 'active',
        ]);

        return redirect('admin/sessions')->with('message', 'session created successfully');
    }

    public function startFirstTerm(Requests\StartFirstTerm $request){

        $session = Session::find($request->session_id);
        $session->first_term = 'active';

        $session->save();


        return redirect('admin/sessions')->with('message', 'First term started');
    }

    public function startSecondTerm(Requests\StartSecondTerm $request){

        $session = Session::find($request->session_id);

        $session->second_term = 'active';

        $session->save();

        return redirect('admin/sessions')->with('message', 'Second term started');
    }


    public function closeFirstTerm(Requests\CloseFirstTerm $request){

        $session = Session::find($request->session_id);
        $session->first_term = 'closed';

        $session->save();

        return redirect('admin/sessions')->with('message', 'First term closed');
    }


    public function startThirdTerm(Requests\StartThirdTerm $request){

        $session = Session::find($request->session_id);

        $session->third_term = 'active';

        $session->save();

        return redirect('admin/sessions')->with('message', 'Third term started');
    }

    public function closeSecondTerm(Requests\CloseSecondTerm $request){

        $session = Session::find($request->session_id);

        $session->second_term = 'closed';

        $session->save();

        return redirect('admin/sessions')->with('message', 'Second term closed');
    }

    public function closeThirdTerm(Requests\CloseThirdTerm $request){

        $session = Session::find($request->session_id);


        $session->third_term = 'closed';

        $session->save();

        return redirect('admin/sessions')->with('message', 'Third term closed');
    }

    public function closeSession(Requests\CloseSession $request){

        $session = Session::find($request->session_id);

        $session->status = 'closed';

        $session->save();

        return redirect('admin/sessions')->with('message', 'Session closed, see you next session');
    }
}
