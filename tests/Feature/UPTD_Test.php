<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UPTD_Test extends TestCase
{


    public function test_ObtenerListadoDePost()
    {
        $estructuraEsperable = [
            '*' => [
                'id',
                'usuario',
                'contenido',
                'created_at',
                'updated_at',
                'deleted_at'
            ]
        ];

        $response = $this->get('/api/post');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }
    public function test_ObtenerUnPost()
    {
        $estructuraEsperable = [

            'id',
            'usuario',
            'contenido',
            'created_at',
            'updated_at',
            'deleted_at'

        ];

        $response = $this->get('/api/post/3');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_ObtenerUnaPostQueNoExiste()
    {
        $response = $this->get('/api/post/99999');
        $response->assertStatus(404);
    }

    public function test_CrearUnPost()
    {
        $estructuraEsperable = [
            'id',
            'usuario',
            'contenido',
            'created_at',
            'updated_at',


        ];

        $datosDePost = [
            "usuario" => 9,
            "contenido" => "aguante la mercaaaaaaaaaaaaaaaaaaaa"
        ];

        $response = $this->post('/api/post', $datosDePost);
        $response->assertStatus(201);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDePost);

        $this->assertDatabaseHas('post', [
            "usuario" => 9,
            "contenido" => "aguante la mercaaaaaaaaaaaaaaaaaaaa"
        ]);
    }

    public function test_EliminarPostQueNoExiste()
    {
        $response = $this->delete('/api/post/99999');
        $response->assertStatus(404);
    }

    public function test_EliminarPost()
    {
        $response = $this->delete('/api/post/2');
        $response->assertStatus(200);
        $response->assertJsonStructure(['mensaje']);
        $response->assertJsonFragment(['mensaje' => 'Post eliminado']);

        $this->assertDatabaseMissing('post', [
            'id' => '2',
            'deleted_at' => null
        ]);
    }

    public function test_ModificarPost()
    {
        $estructuraEsperable = [

            'id',
            'usuario',
            'contenido',
            'created_at',
            'updated_at',
            'deleted_at'

        ];

        $datosDePost = [
            "usuario" => 1,
            "contenido" => "Soy un arbol"
        ];

        $response = $this->put('/api/post/3', $datosDePost);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDePost);
        $this->assertDatabaseHas('post', [
            "usuario" => 1,
            "contenido" => "Soy un arbol"
        ]);
    }

    public function test_ModificarPostQueNoExiste()
    {
        $response = $this->put('/api/post/99999');
        $response->assertStatus(404);
    }

    public function test_ObtenerListadoDeComentario()
    {
        $estructuraEsperable = [
            '*' => [
                'id',
                'idUsuario',
                'contenido',
                'created_at',
                'updated_at',
                'deleted_at'
            ]
        ];

        $response = $this->get('/api/comentario');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_ObtenerUnComentario()
    {
        $estructuraEsperable = [

            'id',
            'idUsuario',
            'contenido',
            'created_at',
            'updated_at',
            'deleted_at'

        ];

        $response = $this->get('/api/comentario/3');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_ObtenerUnComentarioQueNoExiste()
    {
        $response = $this->get('/api/comentario/99999');
        $response->assertStatus(404);
    }


    public function test_CrearUnComentario()
    {
        $estructuraEsperable = [

            "idUsuario",
            "contenido",
            "updated_at",
            "created_at",
            "id",

        ];

        $datosDeComentario = [
            "idUsuario" => 1,
            "contenido" => "caballo homosexual de las montañas"
        ];

        $response = $this->post('/api/comentario', $datosDeComentario);
        $response->assertStatus(201);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeComentario);

        $this->assertDatabaseHas('comentario', [
            "idUsuario" => 1,
            "contenido" => "caballo homosexual de las montañas"
        ]);
    }

    public function test_EliminarComentarioQueNoExiste()
    {
        $response = $this->delete('/api/comentario/99999');
        $response->assertStatus(404);
    }

    public function test_EliminarComentario()
    {
        $response = $this->delete('/api/comentario/2');
        $response->assertStatus(200);
        $response->assertJsonStructure(['mensaje']);
        $response->assertJsonFragment(['mensaje' => 'Comentario eliminado']);

        $this->assertDatabaseMissing('Comentario', [
            'id' => '2',
            'deleted_at' => null
        ]);
    }

    public function test_ModificarComentario()
    {
        $estructuraEsperable = [

            'id',
            'usuario',
            'contenido',
            'created_at',
            'updated_at',
            'deleted_at'

        ];

        $datosDePost = [
            "usuario" => 1,
            "contenido" => "ElGatoSapeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee"
        ];

        $response = $this->put('/api/post/3', $datosDePost);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDePost);
        $this->assertDatabaseHas('post', [
            "usuario" => 1,
            "contenido" => "ElGatoSapeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee"
        ]);
    }

    public function test_ModificarComentarioQueNoExiste()
    {
        $response = $this->put('/api/comentario/99999');
        $response->assertStatus(404);
    }

    public function test_ObtenerListadoDeMegustaPost()
    {
        $estructuraEsperable = [
            '*' => [
                'usuario',
                'post_id',
                'created_at',
                'updated_at',
                'deleted_at'
            ]
        ];

        $response = $this->get('/api/megustapost');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_ObtenerUnMegustaPost()
    {
        $estructuraEsperable = [

            'usuario',
            'post_id',
            'created_at',
            'updated_at',
            'deleted_at'

        ];

        $response = $this->get('/api/megustapost/3');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_ObtenerUnMegustaPostQueNoExiste()
    {
        $response = $this->get('/api/megustapost/99999');
        $response->assertStatus(404);
    }

    public function test_CrearUnMegustaPost()
    {
        $estructuraEsperable = [

            'usuario',
            'post_id',
            'created_at',
            'updated_at'


        ];

        $datosDeMegustapost = [
            "usuario" => 1,
            "post_id" => 1
        ];

        $response = $this->post('/api/megustapost', $datosDeMegustapost);
        $response->assertStatus(201);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeMegustapost);

        $this->assertDatabaseHas('megusta', [
            "usuario" => 1,
            "post_id" => 1
        ]);
    }

    public function test_EliminarMegustaPostQueNoExiste()
    {
        $response = $this->delete('/api/megustapost/99999');
        $response->assertStatus(404);
    }

    public function test_EliminarMegustapost()
    {
        $response = $this->delete('/api/megustapost/1');
        $response->assertStatus(200);
        $response->assertJsonStructure(['mensaje']);
        $response->assertJsonFragment(['mensaje' => 'Me gusta post eliminado']);

        $this->assertDatabaseMissing('megusta', [
            'id' => '1',
            'deleted_at' => null
        ]);
    }

    public function test_ModificarMegustaPost()
    {
        $estructuraEsperable = [

            'usuario',
            'post_id',
            'created_at',
            'updated_at',
            'deleted_at'

        ];

        $datosDeMegustapost = [
            "usuario" => 1,
            "post_id" => 2
        ];

        $response = $this->put('/api/megustapost/3', $datosDeMegustapost);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeMegustapost);
        $this->assertDatabaseHas('megusta', [
            "usuario" => 1,
            "post_id" => 2
        ]);
    }

    public function test_ModificarMegustaPostQueNoExiste()
    {
        $response = $this->put('/api/megustapost/99999');
        $response->assertStatus(404);
    }

    public function test_ObtenerListadoDeMegustaComentario()
    {
        $estructuraEsperable = [
            '*' => [
                'usuario',
                'comentario_id',
                'created_at',
                'updated_at',
                'deleted_at'
            ]
        ];

        $response = $this->get('/api/megustacomentario');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_ObtenerUnMegustaComentario()
    {
        $estructuraEsperable = [

            'usuario',
            'comentario_id',
            'created_at',
            'updated_at',
            'deleted_at'

        ];

        $response = $this->get('/api/megustacomentario/3');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_ObtenerUnMegustaComentarioQueNoExiste()
    {
        $response = $this->get('/api/megustacomentario/99999');
        $response->assertStatus(404);
    }

    public function test_CrearUnMegustaComentario()
    {
        $estructuraEsperable = [

            'usuario',
            'comentario_id',
            'created_at',
            'updated_at'


        ];

        $datosDeMegustacomentario = [
            "usuario" => 1,
            "comentario_id" => 1
        ];

        $response = $this->post('/api/megustacomentario', $datosDeMegustacomentario);
        $response->assertStatus(201);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeMegustacomentario);

        $this->assertDatabaseHas('megusta', [
            "usuario" => 1,
            "comentario_id" => 1
        ]);
    }

    public function test_EliminarMegustaComentarioQueNoExiste()
    {
        $response = $this->delete('/api/megustacomentario/99999');
        $response->assertStatus(404);
    }

    public function test_EliminarMegustaComentario()
    {
        $response = $this->delete('/api/megustacomentario/1');
        $response->assertStatus(200);
        $response->assertJsonStructure(['mensaje']);
        $response->assertJsonFragment(['mensaje' => 'Me gusta comentario eliminado']);

        $this->assertDatabaseMissing('megusta', [
            'id' => '1',
            'deleted_at' => null
        ]);
    }

    public function test_ModificarMegustaComentario()
    {
        $estructuraEsperable = [

            'usuario',
            'comentario_id',
            'created_at',
            'updated_at',
            'deleted_at'

        ];

        $datosDeMegustacomentario = [
            "usuario" => 1,
            "comentario_id" => 2
        ];

        $response = $this->put('/api/megustacomentario/3', $datosDeMegustacomentario);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeMegustacomentario);
        $this->assertDatabaseHas('megusta', [
            "usuario" => 1,
            "comentario_id" => 2
        ]);
    }

    public function test_ModificarMegustaComentarioQueNoExiste()
    {
        $response = $this->put('/api/megustacomentario/99999');
        $response->assertStatus(404);
    }

    /*--------------------------------------------------------------------------------------------------------------------------------------*/


    public function test_CrearUnUsuario()
    {
        $estructuraEsperable = [
            `ìd`,
            `NombreUsuario`,
            `Contraseña`,
            `Correo`,
            `FechaNacimiento`,
            `Reputacion`,
            `Estado`,
            `Pais`,
            `Ciudad`,
            `Biografia`,
            `Redes`,
            `created_at`,
            `updated_at`,
            `deleted_at`


        ];

        $datosDeUsuario = [
            "NombreUsuario" => "Carlo",
            "Correo" => "carloelmasgrande@gmail.com",
            "contraseña" => "1234567890"
        ];

        $response = $this->post('/api/usuario', $datosDeUsuario);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeUsuario);

        $this->assertDatabaseHas('usuario', [
            "NombreUsuario" => "Carlo",
            "Correo" => "carloelmasgrande@gmail.com",
            "contraseña" => "1234567890"
        ]);
    }

    public function test_ObtenerListadoDeUsuario()
    {
        $estructuraEsperable = [
            '*' => [
                `id`,
                `NombreUsuario`,
                `Contraseña`,
                `Correo`,
                `FechaNacimiento`,
                `Reputacion`,
                `Estado`,
                `Pais`,
                `Ciudad`,
                `Biografia`,
                `Redes`,
                `created_at`,
                `updated_at`,
                `deleted_at`
            ]
        ];

        $response = $this->get('/api/usuario');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_ObtenerUnUsuario()
    {
        $estructuraEsperable = [

            `id`,
            `NombreUsuario`,
            `Contraseña`,
            `Correo`,
            `FechaNacimiento`,
            `Reputacion`,
            `Estado`,
            `Pais`,
            `Ciudad`,
            `Biografia`,
            `Redes`,
            `created_at`,
            `updated_at`,
            `deleted_at`

        ];

        $response = $this->get('/api/usuario/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_ModificarUsuario()
    {
        $estructuraEsperable = [

            `id`,
            `NombreUsuario`,
            `Contraseña`,
            `Correo`,
            `FechaNacimiento`,
            `Reputacion`,
            `Estado`,
            `Pais`,
            `Ciudad`,
            `Biografia`,
            `Redes`,
            `created_at`,
            `updated_at`,
            `deleted_at`

        ];

        $datosDePost = [
            "NombreUsuario" => "Carlo",
            "Correo" => "carloelmasgrande@gmail.com",
            "contraseña" => "lasupercontraseñadecarlo"
        ];

        $response = $this->put('/api/usuario/1', $datosDePost);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDePost);
        $this->assertDatabaseHas('usuario', [
            "NombreUsuario" => "Carlos",
            "Correo" => "carloselmasgrande@gmail.com",
            "contraseña" => "lasupercontraseñadecarlos"
        ]);
    }

    public function test_EliminarUsuario()
    {
        $response = $this->delete('/api/usuario/1');
        $response->assertStatus(200);
        $response->assertJsonStructure(['mensaje']);
        $response->assertJsonFragment(['mensaje' => 'Usuario eliminado']);

        $this->assertDatabaseMissing('usuario', [
            'id' => '1',
            'deleted_at' => null
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
}
