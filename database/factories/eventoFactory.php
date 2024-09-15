<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class eventoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "usuario_id" =>  rand(1, 10),
            "participan" =>  rand(1, 10),
            "fecha" => $this->faker->date(),
            "detalles" => $this->faker->paragraph(1),
            "ubicacion" => $this->faker->paragraph(1),
        ];
    }
}
