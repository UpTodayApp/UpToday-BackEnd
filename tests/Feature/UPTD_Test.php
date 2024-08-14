<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UPTD_Test extends TestCase
{

    public function test_CrearUnUsuario()
    {
        $estructuraEsperable = [
            "NombreUsuario",
            "Correo",
            "Contraseña",
            "updated_at",
            "created_at",
            "id"


        ];

        $datosDeUsuario_id = [
            "NombreUsuario" => "Carlo",
            "Correo" => "carloelmasgrande@gmail.com",
            "Contraseña" => "1234567890"
        ];

        $response = $this->post('/api/usuario', $datosDeUsuario_id);
        $response->assertStatus(201);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeUsuario_id);

        $this->assertDatabaseHas('usuario', [
            "NombreUsuario" => "Carlo",
            "Correo" => "carloelmasgrande@gmail.com",
            "Contraseña" => "1234567890"
        ]);
    }

    public function test_ObtenerListadoDeUsuario_id()
    {
        $estructuraEsperable = [
            '*' => [
                "id",
                "NombreUsuario",
                "Contraseña",
                "Correo",
                "FechaNacimiento",
                "Reputacion",
                "Estado",
                "Pais",
                "Ciudad",
                "Biografia",
                "Redes",
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
            "NombreUsuario",
            "Contraseña",
            "Correo",
            "FechaNacimiento",
            "Reputacion",
            "Estado",
            "Pais",
            "Ciudad",
            "Biografia",
            "Redes",
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
            "NombreUsuario",
            "Contraseña",
            "Correo",
            "FechaNacimiento",
            "Reputacion",
            "Estado",
            "Pais",
            "Ciudad",
            "Biografia",
            "Redes",
            "created_at",
            "updated_at",
            "deleted_at"

        ];

        $datosDePost = [
            "NombreUsuario" => "Carlos",
            "Correo" => "carloselmasgrande@gmail.com",
            "Contraseña" => "1234567534"
        ];

        $response = $this->put('/api/usuario/1', $datosDePost);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDePost);
        $this->assertDatabaseHas('usuario', [
            "NombreUsuario" => "Carlos",
            "Correo" => "carloselmasgrande@gmail.com",
            "Contraseña" => "1234567534"
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


    public function test_CrearUnPost()
    {
        $estructuraEsperable = [
            'id',
            'usuario_id',
            'contenido',
            'created_at',
            'updated_at',


        ];

        $datosDePost = [
            "usuario_id" => 1,
            "contenido" => "aguante la mercaaaaaaaaaaaaaaaaaaaa"
        ];

        $response = $this->post('/api/post', $datosDePost);
        $response->assertStatus(201);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDePost);

        $this->assertDatabaseHas('post', [
            "usuario_id" => 1,
            "contenido" => "aguante la mercaaaaaaaaaaaaaaaaaaaa"
        ]);
    }

    public function test_ObtenerListadoDePost()
    {
        $estructuraEsperable = [
            '*' => [
                'id',
                'usuario_id',
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
            'usuario_id',
            'contenido',
            'created_at',
            'updated_at',
            'deleted_at'

        ];

        $response = $this->get('/api/post/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_ObtenerUnaPostQueNoExiste()
    {
        $response = $this->get('/api/post/99999');
        $response->assertStatus(404);
    }


    public function test_EliminarPostQueNoExiste()
    {
        $response = $this->delete('/api/post/99999');
        $response->assertStatus(404);
    }


    public function test_ModificarPost()
    {
        $estructuraEsperable = [

            'id',
            'usuario_id',
            'contenido',
            'created_at',
            'updated_at',
            'deleted_at'

        ];

        $datosDePost = [
            "usuario_id" => 1,
            "contenido" => "Soy un arbol"
        ];

        $response = $this->put('/api/post/1', $datosDePost);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDePost);
        $this->assertDatabaseHas('post', [
            "usuario_id" => 1,
            "contenido" => "Soy un arbol"
        ]);
    }

    public function test_ModificarPostQueNoExiste()
    {
        $response = $this->put('/api/post/99999');
        $response->assertStatus(404);
    }

    public function test_CrearUnComentario()
    {
        $estructuraEsperable = [

            "usuario_id",
            "contenido",
            "updated_at",
            "created_at",
            "id",

        ];

        $datosDeComentario = [
            "usuario_id" => 1,
            "contenido" => "caballo homosexual de las montañas"
        ];

        $response = $this->post('/api/comentario', $datosDeComentario);
        $response->assertStatus(201);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeComentario);

        $this->assertDatabaseHas('comentario', [
            "usuario_id" => 1,
            "contenido" => "caballo homosexual de las montañas"
        ]);
    }

    public function test_ObtenerListadoDeComentario()
    {
        $estructuraEsperable = [
            '*' => [
                'id',
                'usuario_id',
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
            'usuario_id',
            'contenido',
            'created_at',
            'updated_at',
            'deleted_at'

        ];

        $response = $this->get('/api/comentario/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_ObtenerUnComentarioQueNoExiste()
    {
        $response = $this->get('/api/comentario/99999');
        $response->assertStatus(404);
    }




    public function test_EliminarComentarioQueNoExiste()
    {
        $response = $this->delete('/api/comentario/99999');
        $response->assertStatus(404);
    }

    public function test_ModificarComentario()
    {
        $estructuraEsperable = [

            'id',
            'usuario_id',
            'contenido',
            'created_at',
            'updated_at',
            'deleted_at'

        ];

        $datosDePost = [
            "usuario_id" => 1,
            "contenido" => "ElGatoSapeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee"
        ];

        $response = $this->put('/api/comentario/1', $datosDePost);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDePost);
        $this->assertDatabaseHas('comentario', [
            "usuario_id" => 1,
            "contenido" => "ElGatoSapeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee"
        ]);
    }

    public function test_EliminarComentario()
    {
        $response = $this->delete('/api/comentario/1');
        $response->assertStatus(200);
        $response->assertJsonStructure(['mensaje']);
        $response->assertJsonFragment(['mensaje' => 'Comentario eliminado']);

        $this->assertDatabaseMissing('Comentario', [
            'id' => '2',
            'deleted_at' => null
        ]);
    }



    public function test_ModificarComentarioQueNoExiste()
    {
        $response = $this->put('/api/comentario/99999');
        $response->assertStatus(404);
    }



    public function test_CrearUnMegustaPost()
    {
        $estructuraEsperable = [

            'usuario_id',
            'post_id',
            'created_at',
            'updated_at'


        ];

        $datosDeMegustapost = [
            "usuario_id" => 1,
            "post_id" => 1
        ];

        $response = $this->post('/api/megustapost', $datosDeMegustapost);
        $response->assertStatus(201);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeMegustapost);

        $this->assertDatabaseHas('megusta', [
            "usuario_id" => 1,
            "post_id" => 1
        ]);
    }

    public function test_ObtenerListadoDeMegustaPost()
    {
        $estructuraEsperable = [
            '*' => [
                'usuario_id',
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

            'usuario_id',
            'post_id',
            'created_at',
            'updated_at',
            'deleted_at'

        ];

        $response = $this->get('/api/megustapost/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_ObtenerUnMegustaPostQueNoExiste()
    {
        $response = $this->get('/api/megustapost/99999');
        $response->assertStatus(404);
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


    public function test_CrearUnMegustaComentario()
    {
        $estructuraEsperable = [

            'usuario_id',
            'comentario_id',
            'created_at',
            'updated_at'


        ];

        $datosDeMegustacomentario = [
            "usuario_id" => 1,
            "comentario_id" => 1
        ];

        $response = $this->post('/api/megustacomentario', $datosDeMegustacomentario);
        $response->assertStatus(201);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeMegustacomentario);

        $this->assertDatabaseHas('megusta', [
            "usuario_id" => 1,
            "comentario_id" => 1
        ]);
    }


    public function test_ObtenerListadoDeMegustaComentario()
    {
        $estructuraEsperable = [
            '*' => [
                'usuario_id',
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

            'usuario_id',
            'comentario_id',
            'created_at',
            'updated_at',
            'deleted_at'

        ];

        $response = $this->get('/api/megustacomentario/2');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    public function test_ObtenerUnMegustaComentarioQueNoExiste()
    {
        $response = $this->get('/api/megustacomentario/99999');
        $response->assertStatus(404);
    }


    public function test_EliminarMegustaComentarioQueNoExiste()
    {
        $response = $this->delete('/api/megustacomentario/99999');
        $response->assertStatus(404);
    }

    public function test_EliminarMegustaComentario()
    {
        $response = $this->delete('/api/megustacomentario/2');
        $response->assertStatus(200);
        $response->assertJsonStructure(['mensaje']);
        $response->assertJsonFragment(['mensaje' => 'Me gusta comentario eliminado']);

        $this->assertDatabaseMissing('megusta', [
            'id' => '2',
            'deleted_at' => null
        ]);
    }






/*

    public function test_CrearUnEvento()
    {
        $estructuraEsperable = [
            "usuario_id",
            "participan",
            "fecha",
            "detalles",
            "ubicacion"
            "updated_at",
            "created_at",
            "id"


        ];

        $datosDeEvento = [
            "usuario_id" => 1,
            "participan" => 1,
            "fecha" => 1/1/2001,
            "detalles" => "el super evento de carlos",
            "ubicacion" => "la casa de carlos"
            "updated_at",
            "created_at",
            "id"
        ];

        $response = $this->post('/api/evento', $datosDeEvento);
        $response->assertStatus(201);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeEvento);

        $this->assertDatabaseHas('evento', [
            "usuario_id" => 1,
            "participan" => 1,
            "fecha" => 1/1/2001,
            "detalles" => "el super evento de carlos",
            "ubicacion" => "la casa de carlos"
        ]);
    }

    
    public function test_ObtenerListadoDeEvento()
    {
        $estructuraEsperable = [
            '*' => [
            "usuario_id",
            "participan",
            "fecha",
            "detalles",
            "ubicacion"
            "updated_at",
            "created_at",
            "deleted_at"
            "id"
            ]
        ];

        $response = $this->get('/api/evento');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

    
    public function test_ObtenerUnEvento()
    {
        $estructuraEsperable = [
            "usuario_id",
            "participan",
            "fecha",
            "detalles",
            "ubicacion"
            "updated_at",
            "created_at",
            "deleted_at"
            "id"        
            ];

        $response = $this->get('/api/evento/1');
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
    }

        public function test_ModificarEvento()
    {
        $estructuraEsperable = [
            "usuario_id",
            "participan",
            "fecha",
            "detalles",
            "ubicacion"
            "updated_at",
            "created_at",
            "deleted_at"
            "id"        
        ];

        $datosDeEvento = [
            "usuario_id" => 1,
            "participan" => 1,
            "fecha" => 10/1/2001,
            "detalles" => "el super evento de carlos", la revancha,
            "ubicacion" => "la casa de carlos"
        ];

        $response = $this->put('/api/evento/1', $datosDeEvento);
        $response->assertStatus(200);
        $response->assertJsonStructure($estructuraEsperable);
        $response->assertJsonFragment($datosDeEvento);
        $this->assertDatabaseHas('evento', [
            "usuario_id" => 1,
            "participan" => 1,
            "fecha" => 1/1/2001,
            "detalles" => "el super evento de carlos",
            "ubicacion" => "la casa de carlos"
        ]);
    }

     public function test_ObtenerUnEventoQueNoExiste()
    {
        $response = $this->get('/api/evento/99999');
        $response->assertStatus(404);
    }

    public function test_EliminarEventoQueNoExiste()
    {
        $response = $this->delete('/api/evento/99999');
        $response->assertStatus(404);
    }

    public function test_ModificarEventoQueNoExiste()
    {
        $response = $this->put('/api/evento/99999');
        $response->assertStatus(404);
    }

    public function test_EliminarEvento()
    {
        $response = $this->delete('/api/evento/1');
        $response->assertStatus(200);
        $response->assertJsonStructure(['mensaje']);
        $response->assertJsonFragment(['mensaje' => 'evento eliminado']);

        $this->assertDatabaseMissing('evento', [
            'id' => '1',
            'deleted_at' => null
        ]);
    }
    

*/

    public function test_EliminarPost()
    {
        $response = $this->delete('/api/post/1');
        $response->assertStatus(200);
        $response->assertJsonStructure(['mensaje']);
        $response->assertJsonFragment(['mensaje' => 'Post eliminado']);

        $this->assertDatabaseMissing('post', [
            'id' => '1',
            'deleted_at' => null
        ]);
    }
    public function test_EliminarUsuario()
    {
        $response = $this->delete('/api/usuario/1');
        $response->assertStatus(200);
        $response->assertJsonStructure(['mensaje']);
        $response->assertJsonFragment(['mensaje' => 'usuario eliminado']);

        $this->assertDatabaseMissing('usuario', [
            'id' => 1,
            'deleted_at' => null
        ]);
    }


}
