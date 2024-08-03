@include("base.header")

<h3>Crear una pizza</h3>


<form action="/modificarPost" method="post">
    @csrf
    <input type="hidden" name="id" value="{{ $post -> id }}">
    Usuario: <input type="number" name="usuario" value="{{ $post -> usuario }}"> <br>
    Contenido: <input type="text" name="contenido" value="{{ $post -> contenido }}"> <br><br>
    <input type="submit" value="Enviar">
</form>