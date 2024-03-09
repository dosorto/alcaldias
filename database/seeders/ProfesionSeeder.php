<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profesion_oficio;

class ProfesionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profecion_oficio = [
            [
                'nombre' => 'Médico',
                'created_by'=> 1,
            ],
            [
                'nombre' => 'Ingeniero',
                'created_by'=> 1,
            ],
            [
                'nombre' => 'Abogado',
                'created_by'=> 1,
            ],
            [
                'nombre' => 'Profesor',
                'created_by'=> 1,
            ],
            [
                'nombre' => 'Contador',
                'created_by'=> 1,
            ],
            [
                'nombre' => 'Electricista',
                'created_by'=> 1,
            ],
            [
                'nombre' => 'Carpintero',
                'created_by'=> 1,
            ],
            [
                'nombre' => 'Enfermero',
                'created_by'=> 1,
            ],
            [
                'nombre' => 'Periodista',
                'created_by'=> 1,
            ],
            [
                'nombre' => 'Bombero',
                'created_by'=> 1,
            ],
            [
                'nombre' => 'Policía',
                'created_by'=> 1,
            ],
            [
                'nombre' => 'Agricultor',
                'created_by'=> 1,
            ],
            [
                'nombre' => 'Soldador',
                'created_by'=> 1,
            ],
        ];
        foreach ($profecion_oficio as $prof_ofi) {
            Profesion_oficio::forceCreate($prof_ofi);
        }
    }
}