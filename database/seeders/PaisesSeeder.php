<?php

namespace Database\Seeders;

use App\Models\Paise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaisesSeeder extends Seeder
{
    public function run()
    {
        $paises = [
            [
                'codigo' => '+504',
                'nombre' => 'Honduras',
                'iso_code' => 'HND',
                'created_by'=> 1,
            ],
            [
                'codigo' => '+505',
                'nombre' => 'Nicaragua',
                'iso_code' => 'NI',
                'created_by'=> 1,
            ],
            [
                'codigo' => '+503',
                'nombre' => 'El Salvador',
                'iso_code' => 'SLV',
                'created_by'=> 1,
            ],
            [
                'codigo' => '+502',
                'nombre' => 'Guatemala',
                'iso_code' => 'GTM',
                'created_by'=> 1,
            ],
            [
                'codigo' => '+506',
                'nombre' => 'Costa Rica',
                'iso_code' => 'CRI',
                'created_by'=> 1,
            ],

        ];

        // Inserta los países en la base de datos
        foreach ($paises as $pais) {
            Paise::forceCreate($pais);
        }
    }
}
