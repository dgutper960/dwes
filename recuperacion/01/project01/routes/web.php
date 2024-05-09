<?php

use App\Http\Controllers\EjemploController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ArticuloController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

// LLamamos a la vista sin pasar por el controlador
Route::get('/ejemplo', function () {
    return view('ejemplo.home');
});

Route::get('/ejemplo', EjemploController::class);


// Vinculamos cada Ruta con un método en una sola instrucción
// La función name() es opcional. Asigna un nombre que puede ser usado para genera rutas dinámicas 
Route::group(['prefix' => 'clientes'], function () {
    Route::get('/', [ClientController::class, 'index'])->name('clientes.index');
    Route::get('/create', [ClientController::class, 'create'])->name('clientes.create');
    Route::post('/store', [ClientController::class, 'store'])->name('clientes.store');
    Route::get('/show/{id}', [ClientController::class, 'show'])->name('clientes.show');
    Route::get('/edit/{id}', [ClientController::class, 'edit'])->name('clientes.edit');
    Route::post('/update/{id}', [ClientController::class, 'update'])->name('clientes.update');
    Route::get('/delete/{id}', [ClientController::class, 'destroy'])->name('clientes.destroy');
});

// Accedemos al método index del controlador ArrticulosController
Route::get('/articulos', [ArticuloController::class, 'index']);