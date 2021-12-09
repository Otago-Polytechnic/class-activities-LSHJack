<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\transaction;

class transactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return transaction::all();
    
        // SQL equivalent: SELECT * FROM transaction;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return transaction::create($request->all());

        // SQL equivalent: 
        // INSERT INTO transaction
        // VALUES ($request->name, $request->totalprice, $request->phone, $request->address, $request->status);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return transaction::find($id);

        // SQL equivalent: SELECT * FROM transaction WHERE id = $id;
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
        $transaction = transaction::find($id);
        $transaction->update($request->all());
        return $transaction;

        // SQL equivalent:
        // UPDATE transaction
        // SET name = $request->name, totalprice = $request->totalprice, phone = $request->phone,
        //              address = $request->address, status = $request->status
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
        return transaction::destroy($id);
    
        // SQL equivalent:
        // DELETE FROM transaction
        // WHERE id = $id;
    }
}
