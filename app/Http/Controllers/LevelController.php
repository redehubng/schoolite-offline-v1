<?php

namespace App\Http\Controllers;

use App\Teacher;
use Illuminate\Http\Request;
use App\Level;
use App\Http\Requests;

class LevelController extends Controller
{

    public function index(){
        $levels = Level::all();
        $teachers = Teacher::all();
        return view('level.index')->with('levels', $levels)->with('teachers', $teachers);
    }

    public function store(Requests\StoreNewLevel $request){

        Level::create([
            'name' => $request->name,
            'rank' => $request->rank,
            'teacher_id' => $request->teacher_id
        ]);

        return back()->with('message', 'Level created successfully');

    }
}
