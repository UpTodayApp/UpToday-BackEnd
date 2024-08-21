<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UpTodayController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Autenticacion;

Route::get("/", [UpTodayController::class, "Listar"]);


Route::get('/login', function () {
    return view('login');
});

Route::get('/logout', [UserController::class, "Logout"]);

Route::post("/login", [UserController::class, "Login"]);

Route::get('/crear', function () {
    return view('crear');
})->middleware(Autenticacion::class);

Route::post('/crear', [UpTodayController::class, "Crear"])
    ->middleware(Autenticacion::class);

Route::get("/eliminar/{d}", [UpTodayController::class, "Eliminar"])
    ->middleware(Autenticacion::class);

Route::get('/modificar/{d}', [UpTodayController::class, "MostrarFormularioDeModificar"])
    ->middleware(Autenticacion::class);
Route::post('/modificar', [UpTodayController::class, "Modificar"])
    ->middleware(Autenticacion::class);
