<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class usuarioTest extends TestCase
{

    public function test_CrearUnUsuario()
    {
        $estructuraEsperable = [
            "nombre",
            "correo",
            "contrasenia",
            "updated_at",
            "created_at",
            "id"


        ];

        $datosDeUsuario_id = [
            "nombre" => "Carlo",
            "correo" => "carloelmasgrande@gmail.com",
            "contrasenia" => "1234567890"
        ];

        $response = $this->post('/api/usuario', $datosDeUsuario_id);
        $response->assertStatus(201);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeUsuario_id);

        $this->assertDatabaseHas('usuario', [
            "nombre" => "Carlo",
            "correo" => "carloelmasgrande@gmail.com",
            "contrasenia" => "1234567890"
        ]);
    }

    public function test_ObtenerListadoDeUsuario_id()
    {
        $estructuraEsperable = [
            '*' => [
                "id",
                "nombre",
                "contrasenia",
                "correo",
                "nacimiento",
                "estado",
                "pais",
                "ciudad",
                "biografia",
                "redes",
                "created_at",
                "updated_at",
                "deleted_at"
            ]
        ];

        $response = $this->get('/api/usuario');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_ObtenerUnUsuario_id()
    {
        $estructuraEsperable = [
            "id",
            "nombre",
            "contrasenia",
            "correo",
            "nacimiento",
            "estado",
            "pais",
            "ciudad",
            "biografia",
            "redes",
            "created_at",
            "updated_at",
            "deleted_at"
        ];

        $response = $this->get('/api/usuario/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_ModificarUsuario_id()
    {
        $estructuraEsperable = [

            "id",
            "nombre",
            "contrasenia",
            "correo",
            "nacimiento",
            "pais",
            "ciudad",
            "biografia",
            "redes",
            "created_at",
            "updated_at",
            "deleted_at"

        ];

        $datosDePost = [
            "nombre" => "Carlos",
            "correo" => "carloselmasgrande@gmail.com",
            "contrasenia" => "1234567534"
        ];

        $response = $this->put('/api/usuario/2', $datosDePost);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDePost);
        $this->assertDatabaseHas('usuario', [
            "nombre" => "Carlos",
            "correo" => "carloselmasgrande@gmail.com",
            "contrasenia" => "1234567534"
        ]);
    }

    public function test_ObtenerUnUsuarioQueNoExiste()
    {
        $response = $this->get('/api/usuario/99999');
        $response->assertStatus(404);
    }

    public function test_EliminarUsuarioQueNoExiste()
    {
        $response = $this->delete('/api/usuario/99999');
        $response->assertStatus(404);
    }

    public function test_ModificarUsuarioQueNoExiste()
    {
        $response = $this->put('/api/usuario/99999');
        $response->assertStatus(404);
    }

    public function test_EliminarUsuario()
    {
        $response = $this->delete('/api/usuario/5');
        $response->assertStatus(200);
        $response->assertJsonStructure(['mensaje']);
        $response->assertJsonFragment(['mensaje' => 'usuario eliminado']);

        $this->assertDatabaseMissing('usuario', [
            'id' => 4,
            'deleted_at' => null
        ]);
    }

}
