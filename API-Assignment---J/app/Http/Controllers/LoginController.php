<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\login;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return login::all();
    
        // SQL equivalent: SELECT * FROM login;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return login::create($request->all());

        // SQL equivalent: 
        // INSERT INTO login
        // VALUES ($request->name, $request->email, $request->password, $request->phone, $request->address);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return login::find($id);

        // SQL equivalent: SELECT * FROM login WHERE id = $id;
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
        $login = login::find($id);
        $login->update($request->all());
        return $login;

        // SQL equivalent:
        // UPDATE login
        // SET name = $request->name, email = $request->email, password = $request->password,
        //              phone = $request->phone, address = $request->address
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
        return login::destroy($id);
    
        // SQL equivalent:
        // DELETE FROM login
        // WHERE id = $id;
    }
}
