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
Route::resource('empresas', 'CompanyController');

Route::post('hola', [
    'as' => 'prueba', 'uses' => 'InvoiceController@prueba'
]);

Route::get('pdf/{id}', 'PdfController@invoice')->name('pdf');
Route::get ('github', 'PdfController@github');

Route::any('/', function(){
    // return View::make('home'); 
    // or this
	return view('welcome');
});



// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', ['as' =>'auth/login', 'uses' => 'Auth\AuthController@postLogin']);
Route::get('auth/logout', ['as' => 'auth/logout', 'uses' => 'Auth\AuthController@getLogout']);

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', ['as' => 'auth/register', 'uses' => 'Auth\AuthController@postRegister']);


Route::get('migrate',  array('as' => 'install', function(){

    try {

      echo '<br>init with app tables migrations...';
      Artisan::call('migrate', array('--force' => true));
      echo '<br>done with app tables migrations';
      

    } catch (Exception $e) {
      Response::make($e->getMessage(), 500);
    }

}));
