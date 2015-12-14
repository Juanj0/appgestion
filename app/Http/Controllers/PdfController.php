<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Invoice;


class PdfController extends Controller
{

    public function invoice($id) 
    {

        $Invoice = Invoice::find($id);
        $img_logo = public_path() .'\assets\img\logo_cotizacion.jpg';
        $route_css = public_path() .'\assets\css\style.css';

        /*
        $img_logo = url() .'/assets/img/logo_cotizacion.jpg';
        $route_css = url() .'/assets/css/style.css';
        */

        //$data = $this->getData();
        //$date = date('Y-m-d');
        //$invoice = "2222";

        //$view =  \View::make('report.invoice', compact('data', 'date', 'invoice'))->render();

        $view =  \View::make('report.invoice', compact('Invoice','img_logo','route_css'))->render();

        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream();
        return ($view);
    }

    public function getData() 
    {


        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }


}
