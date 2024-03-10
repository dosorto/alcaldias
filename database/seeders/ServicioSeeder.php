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
                'nombre_servicio'=>'Declaracion de impuestos',
                'tipo_servivio_id'=>1,
                'nivel_servicio_id'=>2,
                'clave_presupuestaria'=>'CP1',
                'importes'=>900.00,
                'fecha_creacion'=>'2023-10-10',
                'status'=>'1',
                'created_by'=>1,
            ],
            [
                'nombre_servicio'=>'Carta de compra-venta',
                'tipo_servicio_id'=>2,
                'nivel_servicio_id'=>3,
                'clave_presupuestaria'=>'CP2',
                'importes'=>1000.00,
                'fecha_creacion'=>'2023-10-10',
                'status'=>'1',
                'created_by'=>1,
            ],


        ];

        foreach ($servicios as $ser) {
            Servicio::forceCreate($ser);
        }
    }


}
