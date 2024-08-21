<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="/css/StyleAdmin.css">
</head>

<body>

    <h1>Ingresar a usuario Administrador</h1>
    <a href="/">Inicio</a> - <a href="/crear">Crear</a>
    <br>
    @if( Auth::check())
    Bienvenido {{ Auth::user() -> name }}. <a href="/logout">Cerrar sesion</a>
    @else
    <a href="/login">Iniciar sesion </a><br><br>
    @endif