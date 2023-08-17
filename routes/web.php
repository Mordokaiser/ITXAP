<?php
use App\Http\Controllers\MatrizController;
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

Route::get('/', function () {
    return view('index');
})->name("ejercicio1");
Route::get('/2', function () {
    return view('ej2');
})->name("ejercicio2");
Route::get('/3', function () {
    return view('ej3');
})->name("ejercicio3");
Route::get('/4', function () {
    return view('ej4');
})->name("ejercicio4");
Route::get('/matriz-1', function () {
    return view('ej4P1');
})->name("ejercicio4-p1");
Route::get('/matriz-2', function () {
    return view('ej4P2');
})->name("ejercicio4-p2");

//rutas del controlador
Route::resource('/matriz', MatrizController::class);