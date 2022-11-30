<?php

namespace App\Http\Controllers;

use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stocks = Stock::all();
 
        return view('stocks.index', compact('stocks')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stocks.create'); // -> resources/views/stocks/create.blade.php
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validation for required fields (and using some regex to validate our numeric value)
        $request->validate([
            'stock_name'=>'required',
            'ticket'=>'required',
            'value'=>'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/'
        ]); 
        // Getting values from the blade template form
        $stock = new Stock([
            'stock_name' => $request->get('stock_name'),
            'ticket' => $request->get('ticket'),
            'value' => $request->get('value')
        ]);
        $stock->save();
        return redirect('/stocks')->with('success', 'Stock saved.');   // -> resources/views/stocks/index.blade.php
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stock = Stock::find($id);
        return view('stocks.edit',['stock'=>$stock]);  // -> resources/views/stocks/edit.blade.php
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
         // Validation for required fields (and using some regex to validate our numeric value)
        $request->validate([
            'stock_name'=>'required',
            'ticket'=>'required',
            'value'=>'required|max:10|regex:/^-?[0-9]+(?:\.[0-9]{1,2})?$/'
        ]); 
        $stock = Stock::find($id);
        // Getting values from the blade template form
        $stock->stock_name =  $request->get('stock_name');
        $stock->ticket = $request->get('ticket');
        $stock->value = $request->get('value');
        $stock->save();

        return redirect('/stocks'); // -> resources/views/stocks/index.blade.php
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stock = Stock::find($id);
        $stock->delete(); // Easy right?

        return redirect('/stocks');  // -> resources/views/stocks/index.blade.php
    }
}
