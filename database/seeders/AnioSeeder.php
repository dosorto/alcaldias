<?php

namespace Database\Seeders;

use App\Models\Anio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AnioSeeder extends Seeder
{
    public function run()
    {
        $anio = [
            [
                'anio' => '2024',
                'created_by'=> 1,
            ],
            [
                'anio' => '2025',
                'created_by'=> 1,
            ],
            [
                'anio' => '2026',
                'created_by'=> 1,
            ],
            [
                'anio' => '2027',
                'created_by'=> 1,
            ],
            [
                'anio' => '2028',
                'created_by'=> 1,
            ],
        ];

        foreach ($anio as $anios) {
            Anio::forceCreate($anios);
        }
    }
}
