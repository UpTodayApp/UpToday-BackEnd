<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function Crear(Request $request)
    {
        if ($request->has("contenido") && $request->has("usuario")) {


            $post = new Post();
            $post->usuario = $request->post("usuario");
            $post->contenido = $request->post("contenido");
            $post->save();
            return $post;
        }
        return response()->json(["error mesage" => "sos un salame"]);
    }

    public function ListarTodas(Request $request)
    {
        return Post::all();
    }

    public function ListarUna(Request $request, $id)
    {
        return Post::findOrFail($id);
    }

    public function Eliminar(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        return ['mensaje' => 'Post eliminado'];
    }

    public function Modificar(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->usuario = $request->post("usuario");
        $post->contenido = $request->post("contenido");
        $post->save();
        return $post;
    }
}
