<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\enrolment;
use App\Models\student;
use App\Models\lecturer;
use App\Models\module;

class EnrolmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return enrolment::all();
    
        // SQL equivalent: SELECT * FROM enrolment;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return enrolment::create($request->all());
    
        // SQL equivalent: 
        // INSERT INTO enrolment
        // VALUES ($request->stid, $request->mid, $request->lid, $request->block, $request->mark);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return student::find($id);
        // Find student ID and show enrolment status
        // SQL equivalent: SELECT * FROM student WHERE id = $id;
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
        $enrolment = enrolment::find($stid);
        $enrolment->update($request->all());
        return $enrolment;

        // SQL equivalent:
        // UPDATE enrolment
        // SET name = $request->name, region = $request->region, country = $request->country
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
        return enrolment::destroy($id);
    
        // SQL equivalent:
        // DELETE FROM enrolment
        // WHERE id = $id;
    }
}
