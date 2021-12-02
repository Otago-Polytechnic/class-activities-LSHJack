<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\lecturer;

class LecturerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return lecturer::all();
    
        // SQL equivalent: SELECT * FROM lecturer;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return lecturer::create($request->all());
    
        // SQL equivalent: 
        // INSERT INTO lecturer
        // VALUES ($request->firstname, $request->lastname, $request->email, $request->address, $request->salary, $request->qualification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return lecturer::find($id);

        // SQL equivalent: SELECT * FROM lecturer WHERE id = $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lecturer = Lecturer::find($id);
        $lecturer->update($request->all());
        return $lecturer;

        // SQL equivalent:
        // UPDATE lecturer
        // SET firstname = $request->firstname, lastname = $request->lastname, email = $request->email, address = $request->address, salary = $request->salary, qualification = $request->qualification
        // WHERE id = $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Lecturer::destroy($id);
    
        // SQL equivalent:
        // DELETE FROM lecturer
        // WHERE id = $id;
    }
}
