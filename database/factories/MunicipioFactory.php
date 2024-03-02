<?php

namespace Database\Factories;

use App\Models\Municipio;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class MunicipioFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Municipio::class;
    public function definition(): array
    {
        return [
            'CodMunicipio' => $this->faker->codMunicipio(),
            'Nombre' => $this->faker->name(),
            'Departamento' => $this->faker->departamento(),
            'created_by'=>1
        ];
    }
}
