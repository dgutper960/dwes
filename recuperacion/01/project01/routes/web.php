<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


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