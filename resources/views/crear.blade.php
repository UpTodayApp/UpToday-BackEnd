@include("base.header")

<h3>Crear un nuevo usuario</h3>


<form action="/crear" method="post">
    @csrf
    Nombre: <input type="text" name="nombre"> <br>
    Contraseña: <input type="text" name="contraseña"> <br><br>
    <input type="submit" value="Enviar">
</form>


@include("base.footer")