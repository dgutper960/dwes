<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/test', function () {
    return "David - DWES - 2DAW - Prueba";
});

Route::get('/api/user', function () {
    return "Si una máquina puede pensar, resolverá problemas inimaginables para los seres humanos. Alan Turing";
});

Route::get('/{nombre}/{apellidos}', function ($nombre, $apellidos) {
    return "Usuario: {$nombre} {$apellidos}";
});

Route::get('/user/view/{id?}', function ($id = null) {
    if (!is_null($id)) {
        return "El id del usuario es: {$id}";
    } else {
        return "El usuario no está registrado";
    }
});

Route::get('/libros/stock/{titulo}/{stock?}', function ($titulo, $stock = null) {
    if(is_null($stock)){
        return "El libro {$titulo}, no dispone de stock actualmente";
    } else {
        return "El libro {$titulo}, dispone de {$stock} unidades";
    }
});
