<?php

namespace Database\Seeders;

use App\Models\Aldea;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AldeaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $aldeas =[
            [
                'codigo' => '060101',
                'nombre' => 'Choluteca',
                'direccion' => 'ND',
                'latitud'=> 1,
                'longitud'=> 1,
                'municipio_id'=> 1,
                'created_by' => 1,
            ],

            [
                'codigo' => '060102',
                'nombre' => 'Agua Caliente de Linaca',
                'direccion' => 'ND',
                'latitud'=> 1,
                'longitud'=> 1,
                'municipio_id'=> 1,
                'created_by' => 1,
            ],

            [
                'codigo' => '060123',
                'nombre' => 'Santa Rosa de Sampile',
                'direccion' => 'ND',
                'latitud'=> 1,
                'longitud'=> 1,
                'municipio_id'=> 1,
                'created_by' => 1,
            ],

            [
                'codigo' => '061107',
                'nombre' => 'Marilica',
                'direccion' => 'ND',
                'latitud'=> 1,
                'longitud'=> 1,
                'municipio_id'=> 2,
                'created_by' => 1,
            ],

            [
                'codigo' => '061106',
                'nombre' => 'Esquimay Arriba o La Ermita',
                'direccion' => 'ND',
                'latitud'=> 1,
                'longitud'=> 1,
                'municipio_id'=> 2,
                'created_by' => 1,
            ],

            [
                'codigo' => '061102',
                'nombre' => 'Cacautare',
                'direccion' => 'ND',
                'latitud'=> 1,
                'longitud'=> 1,
                'municipio_id'=> 2,
                'created_by' => 1,
            ],

            [
                'codigo' => '060713',
                'nombre' => 'Los Mangles',
                'direccion' => 'ND',
                'latitud'=> 1,
                'longitud'=> 1,
                'municipio_id'=> 3,
                'created_by' => 1,
            ],

            [
                'codigo' => '060702',
                'nombre' => 'Cedeño',
                'direccion' => 'ND',
                'latitud'=> 1,
                'longitud'=> 1,
                'municipio_id'=> 3,
                'created_by' => 1,
            ],

            [
                'codigo' => '060704',
                'nombre' => 'El Botadero',
                'direccion' => 'ND',
                'latitud'=> 1,
                'longitud'=> 1,
                'municipio_id'=> 3,
                'created_by' => 1,
            ],
            [
                'codigo' => '061003',
                'nombre' => 'El Barreal',
                'direccion' => 'ND',
                'latitud'=> 1,
                'longitud'=> 1,
                'municipio_id'=> 4,
                'created_by' => 1,
            ],

            [
                'codigo' => '061001',
                'nombre' => 'Concepción',
                'direccion' => 'ND',
                'latitud'=> 1,
                'longitud'=> 1,
                'municipio_id'=> 4,
                'created_by' => 1,
            ],

            [
                'codigo' => '170311',
                'nombre' => 'Puerto Grande',
                'direccion' => 'ND',
                'latitud'=> 1,
                'longitud'=> 1,
                'municipio_id'=> 4,
                'created_by' => 1,
            ],
        ];
        foreach ($aldeas as $aldea) {
                Aldea::forceCreate($aldea);
        }
    }
}
