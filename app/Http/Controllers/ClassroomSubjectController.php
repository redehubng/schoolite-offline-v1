<?php

namespace App\Http\Controllers;

use App\ClassroomSubject;
use Illuminate\Http\Request;

use App\Http\Requests;

class ClassroomSubjectController extends Controller
{
    public function store(Requests\StoreNewClassroomSubject $request){

        ClassroomSubject::create($request->all());

        return back()->with('message', 'Subject added to classroom');
    }

    public function update(Request $request, $id){
        $classroom_subject = ClassroomSubject::find($id);

        $classroom_subject->teacher_id = $request->teacher_id;

        $classroom_subject->save();

        return back()->with('message', 'Subject teacher updated');
    }
}
