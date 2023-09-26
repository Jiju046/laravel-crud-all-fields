<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Students;
use App\Http\Requests\StoreStudentRequest;

class StudentController extends Controller
{
    //storing all rows from db
    public function index()
    {
        $students = Students::with('city')->get();
        return view('students.index', compact('students')); //pass one or more variable
    }

    //to view create form
    public function create()
    {
        $student = new Students();
        $cities = City::pluck('city','id');
        return view('students.create', compact('student', 'cities'));
    }

    // view
    public function show(Students $student)
    {
        return view('students.show', compact('student'));
    }

    // view update
    public function edit(Students $student)
    { 
        $cities = City::pluck('city','id');
        $student->skills = explode(', ', $student->skills);
        $cityValue = $student->city_id;

        return view('students.edit', compact('student', 'cities', 'cityValue'));
    }


    // insert new data
    public function store(StoreStudentRequest $request)
    { 
        
        $student = new Students($request -> all());
        $student->skills = implode(', ', $request['skills']); // Implode skills array
        $student->save();

        return redirect()->route('students.index')->with('success', 'Created successfully.'); //as session var
    }

    // update db
    public function update(StoreStudentRequest $request, Students $student)
    {
    
        $student->fill($request->except('skills')); // Exclude skills from request
        $student->skills = implode(', ', $request->input('skills')); // Implode skills array    
        $student->save();

        return redirect()->route('students.index')->with('success', 'Updated successfully');
    }

    // delete
    public function destroy(Students $student)
    {

        $student->delete();

        return redirect()->route('students.index')->with('success', 'Deleted successfully');
    }
}