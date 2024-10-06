<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\postController;
use App\Http\Controllers\comentarioController;
use App\Http\Controllers\eventoController;
use App\Http\Controllers\megustaController;
use App\Http\Controllers\usuarioController;


Route::get('/post', [postController::class, 'ListarTodas']);
Route::get('/post/{d}', [postController::class, 'ListarUna']);
Route::post('/post', [postController::class, 'Crear']);
Route::delete('/post/{d}', [postController::class, 'Eliminar']);
Route::put('/post/{d}', [postController::class, 'Modificar']);


Route::get('/comentario', [comentarioController::class, 'ListarTodas']);
Route::get('/comentario/{d}', [comentarioController::class, 'ListarUna']);
Route::post('/comentario', [comentarioController::class, 'Crear']);
Route::delete('/comentario/{d}', [comentarioController::class, 'Eliminar']);
Route::put('/comentario/{d}', [comentarioController::class, 'Modificar']);


Route::get('/megustapost', [megustaController::class, 'ListarTodasPost']);
Route::get('/megustapost/{d}', [megustaController::class, 'ListarUnaPost']);
Route::post('/megustapost', [megustaController::class, 'CrearPost']);
Route::delete('/megustapost/{d}', [megustaController::class, 'EliminarPost']);
Route::put('/megustapost/{d}', [megustaController::class, 'ModificarPost']);

Route::get('/megustaComentario', [megustaController::class, 'ListarTodasComentario']);
Route::get('/megustaComentario/{d}', [megustaController::class, 'ListarUnaComentario']);
Route::post('/megustaComentario', [megustaController::class, 'CrearComentario']);
Route::delete('/megustaComentario/{d}', [megustaController::class, 'EliminarComentario']);
Route::put('/megustaComentario/{d}', [negustaController::class, 'ModificarComentario']);

Route::get('/usuario', [usuarioController::class, 'ListarTodas']);
Route::get('/usuario/{d}', [usuarioController::class, 'ListarUna']);
Route::post('/usuario', [usuarioController::class, 'Crear']);
Route::delete('/usuario/{d}', [usuarioController::class, 'Eliminar']);
Route::put('/usuario/{d}', [usuarioController::class, 'Modificar']);

Route::get('/evento', [eventoController::class, 'ListarTodas']);
Route::get('/evento/{d}', [eventoController::class, 'ListarUna']);
Route::post('/evento', [eventoController::class, 'Crear']);
Route::delete('/evento/{d}', [eventoController::class, 'Eliminar']);
Route::put('/evento/{d}', [eventoController::class, 'Modificar']);
