<?php

namespace Database\Seeders;

use App\Models\TipoPropiedad;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoPropiedadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $TipoPropiedad =[
            [
               
                'Nombre' => 'Residenciales',
                'created_by'=> 1,
            ],
            [
                
                'Nombre' => 'Comerciales',
                'created_by'=> 1,
            ],
            [
                
                'Nombre' => 'Industriales',
                'created_by'=> 1,
            ],
            [
               
                'Nombre' => 'Institucionales',
                'created_by'=> 1,
            ],
            [
                
                'Nombre' => 'Parcelas',
                'created_by'=> 1,
            ],
        ];

        foreach ($TipoPropiedad as $tipoP) {
            TipoPropiedad::forceCreate($tipoP);
        }
    }
}