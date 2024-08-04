<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function Crear(Request $request)
    {
        if ($request->has("Correo") && $request->has("Contraseña")) {


            $usuario = new usuario();
            $usuario->NombreUsuario = $request->post("NombreUsuario");
            $usuario->Correo = $request->post("Correo");
            $usuario->Contraseña = $request->post("Contraseña");
            $usuario->save();
            return $usuario;
        }
        return response()->json(["error mesage" => "no se pudo crear el usuario, hubo un error"]);
    }

    public function ListarTodas(Request $request)
    {
        return usuario::all();
    }

    public function ListarUna(Request $request, $id)
    {
        return usuario::findOrFail($id);
    }

    public function Eliminar(Request $request, $id)
    {
        $post = usuario::findOrFail($id);
        $post->delete();
        return ['mensaje' => 'usuario eliminado'];
    }

    public function Modificar(Request $request, $id)
    {
        $usuario = usuario::findOrFail($id);
        $usuario->NombreUsuario = $request->post("NombreUsuario");
        $usuario->Correo = $request->post("Correo");
        $usuario->Contraseña = $request->post("Contraseña");
        $usuario->save();
        return $usuario;
    }
}
