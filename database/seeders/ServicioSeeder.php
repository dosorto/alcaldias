<?php

namespace Database\Seeders;

use App\Models\Servicio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServicioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $servicios=[
            [
                'nombre_servicio'=>'',
                'tipo_servivio_id'=>'',
                'nivel_servivio_id'=>'',
                'clave_presupuestaria'=>'',
                'importes'=>'',
                'fecha_creacion'=>'',
                'status'=>'',
                'created_by'=>'',
            ],


        ];

        foreach ($servicios as $servicio) {
            Servicio::forceCreate($servicio);
        }
    }


}
