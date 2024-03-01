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
                'ISOCode' => 'HND',
            ],
            [
                'codigo' => '+505',
                'nombre' => 'Nicaragua',
                'ISOCode' => 'NI',
            ],

        ];

        // Inserta los países en la base de datos
        foreach ($paises as $pais) {
            Paise::create($pais);
        }
    }
}
