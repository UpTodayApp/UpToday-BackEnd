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
            "nombre" => $this->faker->userName(),
            "contrasenia" => $this->faker->password(),
            "correo" => $this->faker->email()
        ];
    }
}
