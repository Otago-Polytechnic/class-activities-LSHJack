<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return student::all();
    
        // SQL equivalent: SELECT * FROM student;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return student::create($request->all());
    
        // SQL equivalent: 
        // INSERT INTO student
        // VALUES ($request->firstname, $request->lastname, $request->email, $request->address);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($stid)
    {
        return student::find($stid);

        // SQL equivalent: SELECT * FROM student WHERE id = $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $stid)
    {
        $student = student::find($stid);
        $student->update($request->all());
        return $student;

        // SQL equivalent:
        // UPDATE student
        // SET firstname = $request->firstname, lastname = $request->lastname, email = $request->email, address = $request->address
        // WHERE id = $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($stid)
    {
        return student::destroy($stid);
    
        // SQL equivalent:
        // DELETE FROM student
        // WHERE id = $id;
    }
}
