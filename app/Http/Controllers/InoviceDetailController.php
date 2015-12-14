<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\InvoicesDetailsRequest;
use App\Http\Controllers\Controller;
use App\Invoices_details;

class InoviceDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('details.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoicesDetailsRequest $request)
    {
        $Detalle = new Invoices_details($request->all());
        $Detalle->save();
        return $Detalle->id;

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
        $Details = Invoices_details::find($id);
        return view('details.form', ['Details' => $Details]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InvoicesDetailsRequest $request, $id)
    {
        $Detalle = Invoices_details::find($id);
        $Detalle->fill($request->all());
        $Detalle->save();
        return 'Editado';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Invoices_details::findOrFail($id)->delete();
        //Flash::error('Producto eliminado.');
        //return redirect()->route('facturas.edit', $id);
    }

}
