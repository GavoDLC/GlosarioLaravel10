<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TerminosController;
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
/*
acceder unicamente a una vista
Route::get('/glosario', function(){
    return view('glosario.index');
});
acceder a la funcion especifica de create del controlador de Terminos.
Route::get('glosario/create', [TerminosController::class,'create']);
*/

//acceder a todas las funciones del controlador
Route::resource('glosario', TerminosController::class);