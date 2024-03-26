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
                'name' => 'Apacilagua',
                'departamento_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '03',
                'name' => 'Namasigüe',
                'departamento_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '04',
                'name' => 'San Antonio de Flores',
                'departamento_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '05',
                'name' => 'Duyure',
                'departamento_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '06',
                'name' => 'San Isidro',
                'departamento_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '07',
                'name' => 'Pespire',
                'departamento_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '08',
                'name' => 'San José',
                'departamento_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '09',
                'name' => 'San Marcos de Colón',
                'departamento_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '10',
                'name' => 'Santa Ana de Yusguare',
                'departamento_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '11',
                'name' => 'Orocuina',
                'departamento_id' => 6,
                'created_by'=> 1,
            ],
            [
                'codigo' => '12',
                'name' => 'Marcovia',
                'departamento_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '13',
                'name' => 'Morolica',
                'departamento_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '14',
                'name' => 'El Corpus',
                'departamento_id' => 1,
                'created_by'=> 1,
            ],
            
            ];
            foreach ($municipios as $municipio) {
                Municipio::forceCreate($municipio);
            }
    }
}
