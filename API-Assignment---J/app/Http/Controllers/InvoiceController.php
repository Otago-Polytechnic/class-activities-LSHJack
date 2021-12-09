<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\invoice;

class invoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return invoice::all();
    
        // SQL equivalent: SELECT * FROM invoice;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return invoice::create($request->all());

        // SQL equivalent: 
        // INSERT INTO invoice
        // VALUES ($request->menuid, $request->unitprice, $request->quantity, $request->price, $request->transid);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return invoice::find($id);

        // SQL equivalent: SELECT * FROM invoice WHERE id = $id;
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
        $invoice = invoice::find($id);
        $invoice->update($request->all());
        return $invoice;

        // SQL equivalent:
        // UPDATE invoice
        // SET menuid = $request->menuid, unitprice = $request->unitprice, quantity = $request->quantity,
        //              price = $request->price, transid = $request->transid
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
        return invoice::destroy($id);
    
        // SQL equivalent:
        // DELETE FROM invoice
        // WHERE id = $id;
    }
}
