<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="resources/css/StyleAdmin.css">
</head>

<body>
    @include("base.header")

    <h2>Login</h2>
    <form action="/login" method="post">
        @csrf
        Usuario: <input type="text" name="email"> <br>
        Contraseña: <input type="contraseña" name="contraseña"> <br>
        <input type="submit" value="Iniciar sesión">
    </form>

    @if(session("failed"))
    <p class="error-message">Credenciales inválidas</p>
    @endif

    @include("base.footer")
</body>

</html>