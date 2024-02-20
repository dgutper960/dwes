<?php

use Illuminate\Support\Facades\Route;
// Cargamos el controlador clientes
use App\Http\Controllers\ClientController;
// Cargamos el controlador cuentas
use App\Http\Controllers\AccountController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//  Vinculamos cada Ruta con un método
// Accedemos al metodo index de ClientController mediante la ruta /clientes
Route::get('/clientes', [ClientController::class, 'index']);

// Accedemos al metodo show de ClientController (indicamos parametro obligatorio)
Route::get('/clientes/show/{id}', [ClientController::class, 'show']);

// Accedemos al metodo edit de ClientController (indicamos parametro obligatorio)
Route::get('/clientes/edit/{id}', [ClientController::class, 'edit']);


/**
 * Agrupamos toddo lo anterior en una sola instruccuión
 * de esta forma:
 */

//  Route::controller(ClientController::class)->group(function(){
//     Route::get('/clientes', [ClientController::class, 'index']);
//     Route::get('/clientes/show/{id}', [ClientController::class, 'show']);
//     Route::get('/clientes/edit/{id}', [ClientController::class, 'edit']);
//  });

/**
 * Generamos las rutas de forma automática Acount con Resource
 * -> esto crea de forma automática en el controlador las rutas del CRUD
 */
Route::resource('cuentas', AccountController::class);

// Si queremos indicar solo algunas rutas en el controlador:
