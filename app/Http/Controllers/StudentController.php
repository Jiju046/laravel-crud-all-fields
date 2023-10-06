<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Student;
use Illuminate\Http\Request;
use App\DataTables\StudentsDataTable;
use App\Http\Requests\StoreStudentRequest;

class StudentController extends Controller
{
    //storing all rows from db
    public function index(StudentsDataTable $dataTable)
    {
        return $dataTable->render('students.index');
    }

    //to view create form
    public function create()
    {
        $student = new Student();
        $cities = City::pluck('city_name','id');
        return view('students.create', compact('student', 'cities'));
    }

    // view
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    // view update
    public function edit(Student $student)
    { 
        $cities = City::pluck('city_name','id');
        $student->skills = explode(', ', $student->skills);
        $cityValue = $student->city_id;

        return view('students.edit', compact('student', 'cities', 'cityValue'));
    }

    // insert new data
    public function store(StoreStudentRequest $request)
    { 
        
        $student = new Student($request -> all());
        $student->skills = implode(', ', $request['skills']); // Implode skills array
        $student->save();

        return redirect()->route('students.index')->with('success', 'Created successfully.'); //as session var
    }

    // update db
    public function update(StoreStudentRequest $request, Student $student)
    {
    
        $student->fill($request->except('skills')); // Exclude skills from request
        $student->skills = implode(', ', $request->input('skills')); // Implode skills array    
        $student->save();

        return redirect()->route('students.index')->with('success', 'Updated successfully');
    }

    // delete
    public function destroy(Student $student, Request $request)
    {

        $student->delete();

        if ($request->ajax()) {
            return response()->json(['message' => 'Book deleted successfully']);
        }

        return redirect()->route('students.index')->with('success', 'Deleted successfully');
    }
}