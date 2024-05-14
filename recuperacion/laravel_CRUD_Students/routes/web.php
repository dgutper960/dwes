<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Asignamos la ruta al contolador home
Route::get('/', HomeController::class)->name('index');

// Asignamos las rutas para los métodos de Alumno
Route::resource('students', StudentController::class);


