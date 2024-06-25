<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ComentarioController;


Route::get('/post', [PostController::class, 'ListarTodas']);
Route::get('/post/{d}', [PostController::class, 'ListarUna']);
Route::post('/post', [PostController::class, 'Crear']);
Route::delete('/post/{d}', [PostController::class, 'Eliminar']);
Route::put('/post/{d}', [PostController::class, 'Modificar']);


Route::get('/comentario', [ComentarioController::class, 'ListarTodas']);
Route::get('/comentario/{d}', [ComentarioController::class, 'ListarUna']);
Route::post('/comentario', [ComentarioController::class, 'Crear']);
Route::delete('/comentario/{d}', [ComentarioController::class, 'Eliminar']);
Route::put('/comentario/{d}', [ComentarioController::class, 'Modificar']);
