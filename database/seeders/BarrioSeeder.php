<?php

namespace Database\Seeders;
use App\Models\Barrio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BarrioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $barrios =[
            [
                
                'nombre' => 'Choluteca',
                'direccion' => 'ND',
                'latitud'=> 1,
                'longitud'=> 1,
                'aldea_id'=> 3,
                'created_by' => 1,
            ],  

        ];
        foreach ($barrios as $barrio) {
            Barrio::forceCreate($barrio);
        }
    }
}
