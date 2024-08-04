<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class usuarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "NombreUsuario" => $this->faker->userName(),
            "Contraseña" => $this->faker->password(),
            "Correo" => $this->faker->email()
        ];
    }
}
