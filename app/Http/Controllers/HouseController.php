<?php

namespace App\Http\Controllers;

use App\House;
use App\Teacher;
use Illuminate\Http\Request;

use App\Http\Requests;

class HouseController extends Controller
{
    public function index(){
        $houses = House::all();
        $teachers = Teacher::all();
        return view('house.index')->with('houses', $houses)->with('teachers', $teachers);
    }

    public function store(Requests\StoreNewHouse $request){

        $house = new House;
        $house->name = $request->name;
        $house->teacher_id = $request->teacher_id === 'n' ? null : $request->teacher_id;
        $house->save();


        return redirect('/admin/houses')->with('message', 'House created successfully');

    }
}
