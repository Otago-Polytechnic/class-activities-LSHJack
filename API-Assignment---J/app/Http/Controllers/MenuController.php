<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\menu;

class menuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return menu::all();
    
        // SQL equivalent: SELECT * FROM menu;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return menu::create($request->all());

        // SQL equivalent: 
        // INSERT INTO menu
        // VALUES ($request->catid, $request->foodname, $request->price, $request->ingredient, $request->image, $request->status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return menu::find($id);

        // SQL equivalent: SELECT * FROM menu WHERE id = $id;
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
        $menu = menu::find($id);
        $menu->update($request->all());
        return $menu;

        // SQL equivalent:
        // UPDATE menu
        // SET catid = $request->catid, foodname = $request->foodname, price = $request->price,
        //              ingredient = $request->ingredient, image = $request->image, status = $request->status
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
        return menu::destroy($id);
    
        // SQL equivalent:
        // DELETE FROM menu
        // WHERE id = $id;
    }
}
