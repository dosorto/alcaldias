<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamento =[
            [
                'codigo' => '01',
                'name' => 'Atlántida',
                'pais_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '02',
                'name' => 'Colón',
                'pais_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '03',
                'name' => 'Comayagua',
                'pais_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '04',
                'name' => 'Copán',
                'pais_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '05',
                'name' => 'Cortés',
                'pais_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '06',
                'name' => 'Choluteca',
                'pais_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '07',
                'name' => 'El Paraíso',
                'pais_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '08',
                'name' => 'Francisco Morazán',
                'pais_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '09',
                'name' => 'Gracias a Dios',
                'pais_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '10',
                'name' => 'Intibucá',
                'pais_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '11',
                'name' => 'Islas de la Bahía',
                'pais_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '12',
                'name' => 'La Paz',
                'pais_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '13',
                'name' => 'Lempira',
                'pais_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '14',
                'name' => 'Ocotepeque',
                'pais_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '15',
                'name' => 'Olancho',
                'pais_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '16',
                'name' => 'Santa Bárbara',
                'pais_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '17',
                'name' => 'Valle',
                'pais_id' => 1,
                'created_by'=> 1,
            ],
            [
                'codigo' => '18',
                'name' => 'Yoro',
                'pais_id' => 1,
                'created_by'=> 1,
            ]
            ];
            foreach ($departamento as $depto) {
                Departamento::forceCreate($depto);
            }
    }
}
