<?php

namespace Database\Seeders;

use App\Models\Paise;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pais = [
            [
                'codigo' => '+504',
                'nombre' => 'Honduras',
                'ISOCode' => 'HND',
            ]
        ];
    }
}
