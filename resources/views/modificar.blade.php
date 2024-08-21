@include("base.header")

<h3>Crear usuario</h3>


<form action="/modificar" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $pizza -> id }}">
    Nombre: <input type="text" name="nombre" value="{{ $UpToday -> nombre }}"> <br>
    Contraseña: <input type="text" name="contraseña" value="{{ $UpToday -> contraseña }}"> <br><br>
    <input type="submit" value="Enviar">
</form>


@include("base.footer")