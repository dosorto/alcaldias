<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Georeferenciacion>
 */
class GeoreferenciacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Coordenadas' => $this->faker->latitude() . ',' . $this->faker->longitude(), 
            'perimetro' => $this->faker->name(),
            'area' => $this->faker->name(),
            'created_by' => 1, 
        ];
    }
}
