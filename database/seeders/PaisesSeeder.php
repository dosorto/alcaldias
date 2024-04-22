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
                'created_by' => 1,
            ],
            [
                'codigo' => '+505',
                'nombre' => 'Nicaragua',
                'iso_code' => 'NI',
                'created_by' => 1,
            ],
            [
                'codigo' => '+1',
                'nombre' => 'Estados Unidos',
                'iso_code' => 'US',
                'created_by' => 1,
            ],
            [
                'codigo' => '+52',
                'nombre' => 'México',
                'iso_code' => 'MX',
                'created_by' => 1,
            ],
            [
                'codigo' => '+501',
                'nombre' => 'Belice',
                'iso_code' => 'BZ',
                'created_by' => 1,
            ],
            [
                'codigo' => '+502',
                'nombre' => 'Guatemala',
                'iso_code' => 'GT',
                'created_by' => 1,
            ],
            [
                'codigo' => '+503',
                'nombre' => 'El Salvador',
                'iso_code' => 'SV',
                'created_by' => 1,
            ],
            [
                'codigo' => '+506',
                'nombre' => 'Costa Rica',
                'iso_code' => 'CR',
                'created_by' => 1,
            ],
            [
                'codigo' => '+507',
                'nombre' => 'Panamá',
                'iso_code' => 'PA',
                'created_by' => 1,
            ],
            [
                'codigo' => '+509',
                'nombre' => 'Haití',
                'iso_code' => 'HT',
                'created_by' => 1,
            ],
            [
                'codigo' => '+51',
                'nombre' => 'Perú',
                'iso_code' => 'PE',
                'created_by' => 1,
            ],
            [
                'codigo' => '+53',
                'nombre' => 'Cuba',
                'iso_code' => 'CU',
                'created_by' => 1,
            ],
            [
                'codigo' => '+54',
                'nombre' => 'Argentina',
                'iso_code' => 'AR',
                'created_by' => 1,
            ],
            [
                'codigo' => '+55',
                'nombre' => 'Brasil',
                'iso_code' => 'BR',
                'created_by' => 1,
            ],
            [
                'codigo' => '+56',
                'nombre' => 'Chile',
                'iso_code' => 'CL',
                'created_by' => 1,
            ],
            [
                'codigo' => '+57',
                'nombre' => 'Colombia',
                'iso_code' => 'CO',
                'created_by' => 1,
            ],
            [
                'codigo' => '+58',
                'nombre' => 'Venezuela',
                'iso_code' => 'VE',
                'created_by' => 1,
            ],
            [
                'codigo' => '+591',
                'nombre' => 'Bolivia',
                'iso_code' => 'BO',
                'created_by' => 1,
            ],
            [
                'codigo' => '+592',
                'nombre' => 'Guyana',
                'iso_code' => 'GY',
                'created_by' => 1,
            ],
            [
                'codigo' => '+593',
                'nombre' => 'Ecuador',
                'iso_code' => 'EC',
                'created_by' => 1,
            ],
            [
                'codigo' => '+594',
                'nombre' => 'Guayana Francesa',
                'iso_code' => 'GF',
                'created_by' => 1,
            ],
            [
                'codigo' => '+595',
                'nombre' => 'Paraguay',
                'iso_code' => 'PY',
                'created_by' => 1,
            ],
            [
                'codigo' => '+596',
                'nombre' => 'Martinica',
                'iso_code' => 'MQ',
                'created_by' => 1,
            ],
            [
                'codigo' => '+597',
                'nombre' => 'Surinam',
                'iso_code' => 'SR',
                'created_by' => 1,
            ],
            [
                'codigo' => '+598',
                'nombre' => 'Uruguay',
                'iso_code' => 'UY',
                'created_by' => 1,
            ],
            [
                'codigo' => '+599',
                'nombre' => 'Caribe Neerlandés',
                'iso_code' => 'AN',
                'created_by' => 1,
            ],
            // Continúa agregando los demás países del Caribe aquí
        ];

        foreach ($paises as $pais) {
            Paise::forceCreate($pais);
        }
    }
}

