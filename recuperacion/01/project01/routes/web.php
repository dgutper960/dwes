<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route::get('/', function () {
//     return 'HolaMundoLaravel';
// });


Route::get('/student', function () {
    return 'Main de Alumnos';
});


// Route::get('/student/new', function () {
//     return 'Crear Nuevo Alumno';
// });

// // Funcion con parámetros

// Route::get('/student/view/{id}', function ($id) {
//     return "Ver Detalles Alumno: $id";
// });

// // Funcion con parámetros opcionales

// Route::get('/student/curso/{id}/{curso?}', function ($id, $curso = null) {
//     return "Ver Detalles Alumno: $id Curso: $curso";
// });

Route::get('/test', function () {
    return "David - DWES - 2DAW - Prueba";
});

Route::get('/api/user', function () {
    return "La física es el sistema operativo del Universo. Steven R Garman";
});


Route::get('/{nombre}/{apellidos}', function ($nombre, $apellidos) {
    return "Usuario: {$nombre} {$apellidos}";
});


Route::get('/user/view/{id?}', function ($id = null) {
    if (!is_null($id)) {
        return "Usuario id: {$id}";
    } else {
        return "El usuario no está registrado";
    }
});

Route::get('/cliente/cuenta/{cliente}/{stock?}', function ($cliente, $cuenta = null) {
    if(is_null($cuenta)){
        return "Seleccione una cuenta de {$cliente}";
    } else {
        return "Perfil de {$cliente}.<br>Mostrando detalles de la cuenta {$cuenta}";
    }
});

// Asociamos una ruta a un controlador
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/new', [UserController::class, 'new']);
// Ruta con parametro 
Route::get('/user/view/{id}', [UserController::class, 'new']);

Route::resource('Client', ClientController::class);