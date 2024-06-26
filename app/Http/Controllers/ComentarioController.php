<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{

    public function Crear(Request $request)
    {
        if ($request->has("contenido") && $request->has("idUsuario")) {


            $comentario = new Comentario();
            $comentario->idUsuario = $request->post("idUsuario");
            $comentario->contenido = $request->post("contenido");
            $comentario->save();
            return $comentario;
        }
        return response()->json(["error mesage" => "sos un salame"]);
    }

    public function ListarTodas(Request $request)
    {
        return Comentario::all();
    }

    public function ListarUna(Request $request, $id)
    {
        return Comentario::findOrFail($id);
    }

    public function Eliminar(Request $request, $id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->delete();
        return ['mensaje' => 'Post eliminado'];
    }

    public function Modificar(Request $request, $id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->idUsuario = $request->post("idUsuario");
        $comentario->contenido = $request->post("contenido");
        $comentario->save();
        return $comentario;
    }

    public function Likear(Request $request, $id)
    {

        $like = [1, 2, 4, 6, 78];
    }
}
