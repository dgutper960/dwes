<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

Route::get('/', function () {
    return view('welcome');
});


// Asignamos las rutas para los métodos de Alumno
Route::resource('students', StudentController::class);
