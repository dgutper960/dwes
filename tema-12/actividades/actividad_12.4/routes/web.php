<?php

use Illuminate\Support\Facades\Route;
// Cargamos el controlador clientes
use App\Http\Controllers\ClientesController;
// Cargamos el controlador producto
use App\Http\Controllers\ProductoController;
// Cargamos el controlador acount
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
// RUTAS CLIENTES
//  Vinculamos cada Ruta con un método en una sola instrucción
 Route::controller(ClientesController::class)->group(function(){
    Route::get('/clientes', [ClientesController::class, 'index']);
    Route::post('/clientes/create', [ClientesController::class, 'create']);
    Route::post('/clientes/update/{id}', [ClientesController::class, 'update']);
    Route::get('/clientes/delete/{id1}/{id2?}', [ClientesController::class, 'delete']);
    Route::get('/clientes/show/{id}', [ClientesController::class, 'show']);
 });

 // RUTAS PRODUCTO
 Route::resource('producto', ProductoController::class);

 // RUTAS DE ACCOUNT
 Route::resource('accounts', AccountController::class)
 ->names([
     'index' => 'inicio_david',
     'create' => 'crear_david',
     'show' => 'mostrar_david',
     'edit' => 'editar_david',
     'update' => 'actualizar_david',
     'destroy' => 'eliminar_david',
 ]);

