@include("base.header")

<h3>Crear un post</h3>


<form action="/crearPost" method="post">
    @csrf
    Usuario: <input type="number" name="usuario"> <br>
    Contenido: <input type="text" name="contenido"> <br><br>
    <input type="submit" value="Enviar">
</form>