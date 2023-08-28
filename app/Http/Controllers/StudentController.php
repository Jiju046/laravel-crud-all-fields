<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    private $cities = [
        'coimbatore' => 'Coimbatore',
        'bangalore' => 'Bangalore',
        'chennai' => 'Chennai',
        'hyderabad' => 'Hyderabad'
    ];
    private $validationRules;

    public function __construct()
    {

        $this->validationRules =
            [
                'name' => 'required',
                'email' => 'required|email',
                'skills' => 'required|array|min:1',
                'gender' => 'required|in:male,female,others',
                'appointment' => 'required',
                'city' => 'required|in:' . implode(',', array_keys($this->cities)),
                'address' => 'required|max:200'

            ];
    }


    //storing all rows from db
    public function index()
    {

        $students = Students::all();
        return view('students.index', compact('students')); //pass one or more variable
    }

    //to view create form
    public function create()
    {
        $student = new Students();
        $cities = $this->cities;
        return view('students.create', compact('student', 'cities'));
    }

    // view
    public function show(Students $student)
    {
        return view('students.show', compact('student'));
    }

    // view update
    public function edit(Students $student)
    { //to view old data  type hint will automatically take id from url
        
        $cities = $this->cities;
        $student->skills = explode(', ', $student->skills);
        $cityValue = $student->city;

        return view('students.edit', compact('student', 'cities', 'cityValue'));
    }


    // insert new data
    public function store(Request $request)
    { //to create data

        $request->validate($this->validationRules);

        $student = new Students($request -> all());
        $student->skills = implode(', ', $request['skills']); // Implode skills array
        $student->save();

        return redirect()->route('students.index')->with('success', 'Created successfully.'); //as session var
    }

    // update db
    public function update(Request $request, Students $student)
    {
        // Validate the input
        $request->validate($this->validationRules);

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