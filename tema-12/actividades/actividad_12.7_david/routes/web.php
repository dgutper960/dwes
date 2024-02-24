<?php
use App\Http\Controllers\ArticuloController;
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
// Accedemos al método index del controlador mediante la ruta (http://localhost:8000/articulos)
Route::get('/articulos', [ArticuloController::class, 'index']);