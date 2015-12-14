<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\InvoiceRequest;
use App\Http\Controllers\Controller;
use App\Client;
use App\Invoice;
use App\Invoice_details;
use Laracasts\Flash\Flash;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Invoices = Invoice::orderBy('created_at', 'desc')->paginate(5);
        return view('invoice.list', ['Invoices' => $Invoices]);
    }

    public function prueba(Request $request)
    {
        dd('Datos' . $request);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $mNumero = Invoice::where('numero', 'REGEXP', '^[0-9]+$')->max('numero');
        $mNumero +=1;
        $mNumero = str_pad($mNumero, 4, '0', STR_PAD_LEFT);
        $Clients = CLient::orderBy('nombre','ASC')->lists('nombre','id');

        return view('invoice.create_modal')
                    ->with('Clients',  $Clients)
                    ->with('mNumero',  $mNumero);

    /*
        return view('invoice.create')
                    ->with('Clients',  $Clients);
    */
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InvoiceRequest $request)
    {
        $Invoice = new Invoice($request->all());
        $Invoice->save();

        return redirect()->route('facturas.edit', $Invoice->id);

        //Flash::success('Se ha creado a ' . $Client->nombre . ', como cliente.');
        //return redirect()->route('clientes.index');
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


        $Invoice = Invoice::find($id);
        $Clients = CLient::orderBy('nombre','ASC')->lists('nombre','id');
                //dd($Invoice->details);

    return view('invoice.create')
                        ->with('Invoice',  $Invoice)
                        ->with('Clients',  $Clients);
        

    /*
        return view('invoice.create')
                    ->with('Clients',  $Clients);
    */

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
        $Invoice = Invoice::find($id);
        $Invoice->fill($request->all());
        $Invoice->save();
        dd($request);

        //Flash::success('Se ha editado la factura: ' . $Invoice->numero . '.');
        //return redirect()->route('facturas.edit', $Invoice->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $detalle = Invoice::find($id)->details();
        $detalle->delete();
        Invoice::findOrFail($id)->delete();

        //Invoice::findOrFail($id)->delete();
        Flash::error('Factura eliminada.');
        return redirect()->route('facturas.index');
    }
}
