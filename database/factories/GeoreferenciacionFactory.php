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
            'latitud' => $this->faker->latitude(),
            'longitud' => $this->faker->longitude(), 
            'area' => $this->faker->randomFloat(2, 0, 100), 
            'perimetro' => $this->faker->randomFloat(2, 0, 100), 
            'created_by'=> 1,
        ];
    }
}