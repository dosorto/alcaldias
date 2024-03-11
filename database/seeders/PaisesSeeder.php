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

        ];

        foreach ($paises as $pais) {
            Paise::forceCreate($pais);
        }
    }
}
