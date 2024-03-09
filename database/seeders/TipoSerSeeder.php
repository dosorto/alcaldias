<?php

namespace Database\Seeders;

use App\Models\Tipo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoSerSeeder extends Seeder
{
    public function run(): void
    {
        $tipo =[
            [
                'nombre' => 'Tesoreria',
                'fechacts' => '2023-10-10',
                'status' => '1',
                'created_by'=> 1,
            ],
            [
                'nombre' => 'Catastro',
                'fechacts' => '2023-10-10',
                'status' => '1',
                'created_by'=> 1,
            ],
            [
                'nombre' => 'Administrativo',
                'fechacts' => '2023-10-10',
                'status' => '1',
                'created_by'=> 1,
            ],
            ];
            foreach ($tipo as $ti) {
                Tipo::forceCreate($ti);
            }
    }
}
