<?php

namespace App\Http\Controllers;

use App\Models\Students;
use App\Http\Requests\StoreStudentsRequest;
use App\Http\Requests\UpdateStudentsRequest;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('students.index', [
            'title' => 'Students',
            'students' => Students::all()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('students.create', [
            'title' => 'Students',
            'bukus' => Students::all()
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStudentsRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStudentsRequest $request)
    {
        $validateData = $request->validate([
            'name' => 'required|min:6',
            'nis' => 'required|unique:students|min:6',
        ]);
        
        Students::create($validateData);

        return redirect('/students')->with('success', 'New students has been added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function show(Students $students)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function edit(Students $students, $student)
    {
        $studentFind = Students::find($student);

        return view('students.edit',compact(['studentFind']), [
            'title' => 'Categories',
            'students' => $students,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentsRequest  $request
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStudentsRequest $request, Students $students, $student)
    {
        $studentFind = Students::find($student);

        $rules = [
            'name' => 'required|min:6',
        ];

        if ($request->nis != $studentFind->nis) {
            $rules['nis'] = 'required|unique:students|min:6';
        }
        
        $validateData = $request->validate($rules);

        $studentFind->update($validateData);

        return redirect('/students')->with('successEdit', 'New student has been edited!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Students  $students
     * @return \Illuminate\Http\Response
     */
    public function destroy(Students $students, Request $request)
    {
        Students::destroy($request->id);

        return redirect('/students')->with('successDelete', 'Student has been deleted!');
    }
}
