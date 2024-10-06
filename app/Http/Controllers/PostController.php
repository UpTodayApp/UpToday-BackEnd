<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;

class postController extends Controller
{
    public function Crear(Request $request)
    {
        if ($request->has("contenido") && $request->has("usuario_id")) {


            $post = new post();
            $post->usuario_id = $request->post("usuario_id");
            $post->contenido = $request->post("contenido");
            $post->ubicacion = $request->post("ubicacion");
            $post->save();
            return $post;
        }
        return response()->json(["error mesage" => "sos un salame"]);
    }

    public function ListarTodas(Request $request)
    {
        return post::all();
    }

    public function ListarUna(Request $request, $id)
    {
        return post::findOrFail($id);
    }

    public function Eliminar(Request $request, $id)
    {
        $post = post::findOrFail($id);
        $post->delete();
        return ['mensaje' => 'post eliminado'];
    }

    public function Modificar(Request $request, $id)
    {
        $post = post::findOrFail($id);
        $post->usuario_id = $request->post("usuario_id");
        $post->contenido = $request->post("contenido");
        $post->contenido = $request->post("ubicacion");
        $post->save();
        return $post;
    }
}
