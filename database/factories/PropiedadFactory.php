<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PropiedadFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'Nombre' => $this->faker->company(), 
            'IdTipoPropiedad' => function () {
                return \App\Models\TipoPropiedad::factory()->create()->id;
            },
            'IdGeoreferencia' => function () {
                return \App\Models\Georeferenciacion::factory()->create()->id;
            },
            'IdBarrio' => \App\Models\Barrio::inRandomOrder()->first()->id,
            'created_by' => 1,
            
        ];
    }
}
