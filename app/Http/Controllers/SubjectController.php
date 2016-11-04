<?php

namespace App\Http\Controllers;

use App\Subject;
use Illuminate\Http\Request;

use App\Http\Requests;

class SubjectController extends Controller
{
    public function index(){
        $subjects = Subject::all();
        return view('subject.index')->with('subjects', $subjects);
    }

    public function store(Requests\StoreNewSubject $request){

        Subject::create($request->all());

        return back()->with('message', 'Subject added successfully');
    }
}
