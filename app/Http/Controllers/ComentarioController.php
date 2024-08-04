<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comentario;

class ComentarioController extends Controller
{

    public function Crear(Request $request)
    {
        if ($request->has("contenido") && $request->has("usuario")) {


            $comentario = new Comentario();
            $comentario->usuario = $request->post("usuario");
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
        return ['mensaje' => 'Comentario eliminado'];
    }

    public function Modificar(Request $request, $id)
    {
        $comentario = Comentario::findOrFail($id);
        $comentario->usuario = $request->post("usuario");
        $comentario->contenido = $request->post("contenido");
        $comentario->save();
        return $comentario;
    }
}
