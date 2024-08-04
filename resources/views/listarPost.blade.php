@include("base.header")

@if(session("creado"))
<b>Post creado</b> <br>
@endif

@if(session("eliminado"))
<b>Post Eliminado</b> <br>
@endif

@if(session("modificado"))
<b>Post Modificado</b> <br>
@endif

<h2>Post registrados </h2>
<table>
    <thead>
        <th>
            Usuario
        </th>
        <th>
            Contenido
        </th>
        <th>
            Fecha de alta
        </th>
    </thead>
    @foreach ($post as $p)
    <tr>
        <td>
            {{ $p->usuario }}
        </td>
        <td>
            {{ $p->contenido }}
        </td>
        <td>
            {{ $p->created_at }}
        </td>

        <td>
            <a href="/eliminarPost/{{ $p->id }}">Eliminar</a>
            <a href="/modificarPost/{{ $p->id }}">Modificar</a>
        </td>
    </tr>
    @endforeach
</table>