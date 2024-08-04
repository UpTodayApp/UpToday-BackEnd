<?php

namespace App\Http\Controllers;

use App\Models\usuario;
use Illuminate\Http\Request;

class usuarioController extends Controller
{
    public function Crear(Request $request)
    {
        if ($request->has("correo") && $request->has("contraseña")) {


            $usuario = new usuario();
            $usuario->NombreUsuario = $request->post("NombreUsuario");
            $usuario->Correo = $request->post("Correo");
            $usuario->Contraseña = $request->post("Contraseña");
            $usuario->save();
            return $usuario;
        }
        return response()->json(["error mesage" => "no se pudo crear el usuario, hubo un error"]);
    }
}
