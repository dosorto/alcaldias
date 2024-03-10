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
                
                'nombre' => 'Los mangos',
                'direccion' => 'ND',
                'latitud'=> 1,
                'longitud'=> 1,
                'aldea_id'=> 1,
                'created_by' => 1,
            ],  
            [
                
                'nombre' => 'El suyapa',
                'direccion' => 'ND',
                'latitud'=> 1,
                'longitud'=> 1,
                'aldea_id'=> 1,
                'created_by' => 1,
            ],  
            [
                
                'nombre' => 'Iztoca',
                'direccion' => 'ND',
                'latitud'=> 1,
                'longitud'=> 1,
                'aldea_id'=> 2,
                'created_by' => 1,
            ],  
            [
                
                'nombre' => 'El estadio',
                'direccion' => 'ND',
                'latitud'=> 1,
                'longitud'=> 1,
                'aldea_id'=> 1,
                'created_by' => 1,
            ],  
            [
                
                'nombre' => 'El Transito',
                'direccion' => 'ND',
                'latitud'=> 11,
                'longitud'=> 11,
                'aldea_id'=>7 ,
                'created_by' => 1,
            ],  
            [
                
                'nombre' => 'El centro',
                'direccion' => 'ND',
                'latitud'=> 11,
                'longitud'=> 12,
                'aldea_id'=>7 ,
                'created_by' => 1,
            ],  

            [
                
                'nombre' => 'La paz',
                'direccion' => 'ND',
                'latitud'=> 11,
                'longitud'=> 12,
                'aldea_id'=>7 ,
                'created_by' => 1,
            ],  
            [
                
                'nombre' => 'Barreal Centro',
                'direccion' => 'ND',
                'latitud'=> 8,
                'longitud'=> 8,
                'aldea_id'=>10 ,
                'created_by' => 1,
            ],  
            [
                
                'nombre' => 'Barreal Limones',
                'direccion' => 'ND',
                'latitud'=> 8,
                'longitud'=> 9,
                'aldea_id'=>10 ,
                'created_by' => 1,
            ],  

            [
                
                'nombre' => 'Las posas',
                'direccion' => 'ND',
                'latitud'=> 8,
                'longitud'=> 9,
                'aldea_id'=>10 ,
                'created_by' => 1,
            ], 

            [
                
                'nombre' => 'Morai',
                'direccion' => 'ND',
                'latitud'=> 8,
                'longitud'=> 9,
                'aldea_id'=>11 ,
                'created_by' => 1,
            ], 
            [
                
                'nombre' => 'Santa Anita',
                'direccion' => 'ND',
                'latitud'=> 9,
                'longitud'=> 9,
                'aldea_id'=>11 ,
                'created_by' => 1,
            ], 




        ];
        foreach ($barrios as $barrio) {
            Barrio::forceCreate($barrio);
        }
    }
}
