<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::resource('clientes', 'ClientController');
Route::resource('facturas', 'InvoiceController');
Route::resource('detalles', 'InoviceDetailController');

Route::post('hola', [
    'as' => 'prueba', 'uses' => 'InvoiceController@prueba'
]);

Route::get('/', function () {
    return view('welcome');
});
