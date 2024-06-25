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
}
