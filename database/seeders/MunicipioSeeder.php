<?php

namespace Database\Seeders;

use App\Models\Municipio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MunicipioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $municipios =[
            [
                'codigo' => '01',
                'name' => 'Choluteca',
                'departamento_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '02',
                'name' => 'Namasigue',
                'departamento_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '03',
                'name' => 'Marcovia',
                'departamento_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '04',
                'name' => 'Orocuina',
                'departamento_id' => 1,
                'created_by'=> 1,
            ],
            
            ];
            foreach ($municipios as $municipio) {
                Municipio::forceCreate($municipio);
            }
    }
}
