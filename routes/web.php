<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentarioController;
use App\Http\Controllers\MegustaController;
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


Route::get('/', [PostController::class, 'ListarTodas']);
Route::get('/post/{d}', [PostController::class, 'ListarUna']);
Route::post('/crearPost', [PostController::class, 'Crear']);
Route::delete('/post/{d}', [PostController::class, 'Eliminar']);
Route::get('/modificarPost}', [PostController::class, 'Modificar']);

Route::get('/crearPost', function () {
    return view('crearPost');
});

Route::get('/modificarPost/{d}', [PostController::class, "MostrarFormularioDeModificar"]);

Route::get('/', function () {
    return view('listarPost', ["post" => [PostController::class, 'ListarTodas']]);
});
