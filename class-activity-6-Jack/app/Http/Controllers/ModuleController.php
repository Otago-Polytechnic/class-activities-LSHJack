<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;

class ModuleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return module::all();
    
        // SQL equivalent: SELECT * FROM module;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return module::create($request->all());
    
        // SQL equivalent: 
        // INSERT INTO module
        // VALUES ($request->name, $request->credit, $request->level);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($mid)
    {
        return module::find($mid);

        // SQL equivalent: SELECT * FROM module WHERE id = $id;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $mid)
    {
        $module = module::find($mid);
        $module->update($request->all());
        return $module;

        // SQL equivalent:
        // UPDATE module
        // SET name = $request->name, credit = $request->credit, level = $request->level
        // WHERE id = $id;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($mid)
    {
        return module::destroy($mid);
    
        // SQL equivalent:
        // DELETE FROM module
        // WHERE id = $id;
    }
}
