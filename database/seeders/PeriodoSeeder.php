<?php

namespace Database\Seeders;

use App\Models\Periodo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PeriodoSeeder extends Seeder
{
    public function run()
    {
        $periodo = [
            [
                'periodo' => 'P1-2024',
                'fecha_inicio' => '2024/01/1',
                'fecha_final' => '2024/01/31',
                'anio_id' => 1,
                'created_by'=> 1,
            ],
            [
                'periodo' => 'P2-2024',
                'fecha_inicio' => '2024/02/1',
                'fecha_final' => '2024/02/28',
                'anio_id' => 1,
                'created_by'=> 1,
            ],
            [
                'periodo' => 'P3-2024',
                'fecha_inicio' => '2024/03/1',
                'fecha_final' => '2024/03/30',
                'anio_id' => 1,
                'created_by'=> 1,
            ],
            [
                'periodo' => 'P4-2024',
                'fecha_inicio' => '2024/04/1',
                'fecha_final' => '2024/04/30',
                'anio_id' => 1,
                'created_by'=> 1,
            ],
            [
                'periodo' => 'P1-2025',
                'fecha_inicio' => '2025/01/1',
                'fecha_final' => '2025/01/31',
                'anio_id' => 2,
                'created_by'=> 1,
            ],
        ];

        foreach ($periodo as $periodos) {
            Periodo::forceCreate($periodos);
        }
    }
}
