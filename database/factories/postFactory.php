<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;


class postFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "usuario_id" => rand(1, 10),
            "contenido" => $this->faker->paragraph(2)
        ];
    }
}
