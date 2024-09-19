<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{

    public function Crear(Request $request)
    {
        if ($request->has("contenido") && $request->has("usuario_id")) {


            $comentario = new Comentario();
            $comentario->usuario_id = $request->post("usuario_id");
            $comentario->contenido = $request->post("contenido");
            $comentario->post_id = $request->post("post_id");
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
        return ['mensaje' => 'Comentario eliminado'];
    }

    public function Modificar(Request $request, $id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->usuario_id = $request->post("usuario_id");
        $comentario->contenido = $request->post("contenido");
        $comentario->save();
        return $comentario;
    }
}
