<?php

namespace Database\Seeders;

use App\Models\Nivel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NivelSerSeeder extends Seeder
{
    public function run(): void
    {
        $nivel =[
            [
                'clave' => 'CM1',
                'nombre' => 'Bajo',
                'fechacts' => '2023-10-10',
                'status' => '1',
                'created_by'=> 1,
            ],
            [
                'clave' => 'CM2',
                'nombre' => 'Medio',
                'fechacts' => '2023-10-10',
                'status' => '1',
                'created_by'=> 1,
            ],
            [
                'clave' => 'CM3',
                'nombre' => 'Alto',
                'fechacts' => '2023-10-10',
                'status' => '1',
                'created_by'=> 1,
            ],
            ];
            foreach ($nivel as $ni) {
                Nivel::forceCreate($ni);
            }
    }
}
