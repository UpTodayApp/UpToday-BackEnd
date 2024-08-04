<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class comentarioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "usuario" => rand(1,10),
            "contenido" => $this->faker->paragraph()
            
        ];
    }
}
