<?php

use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* Esta es una ruta que se está creando. Es una solicitud GET a la raíz de la aplicación. */
Route::get('/', function () {

    /* Returning the view called welcome */
    return view('welcome');
});


/* Creating a route for the client resource. */
Route::resource('client', ClientController::class);

//
