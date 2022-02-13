<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class tareaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre'=> $this->faker->sentence(2),
            'descripcion'=>$this->faker->paragraph(1),
            'estado'=>$this->faker->randomElement(['completo', 'incompleto']),
        ];
    }
}
