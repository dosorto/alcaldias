<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\informacionalcaldia;

class InformacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        informacionalcaldia::create([
            'nombre_alcaldia' => 'N/D',
                'nombre_alcalde' => 'N/D',
                'direccion' => 'N/D',
                'telefono'=> 0,
                'correo'=> 'N/D',
                'correo_notificaciones'=> 'N/D',
                'contrasenia' => 'N/D',
        ]);
    }
}
