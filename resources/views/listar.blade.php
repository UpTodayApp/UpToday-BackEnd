@include("base.header")

@if(session("creado"))
<b>Pizza creada</b> <br>
@endif

@if(session("eliminado"))
<b>Usuario Eliminado</b> <br>
@endif

@if(session("modificado"))
<b>Usuario Modificado</b> <br>
@endif

<h2>Usuarios Activos </h2>
<table>
    <thead>
        <th>
            Nombre
        </th>
        <th>
            Contraseña
        </th>
        <th>
            Fecha de alta
        </th>
    </thead>
    @foreach($UpToday as $p)
    <tr>
        <td>
            {{ $p -> nombre }}
        </td>
        <td>
            {{ $p -> contraseña }}
        </td>
        <td>
            {{ $p -> created_at }}
        </td>

        <td>
            <a href="/eliminar/{{ $p -> id }}">Eliminar</a>
            <a href="/modificar/{{ $p -> id }}">Modificar</a>
        </td>
    </tr>
    @endforeach
</table>

@include("base.footer")