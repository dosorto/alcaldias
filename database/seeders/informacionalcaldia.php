<?php

namespace Database\Seeders;

use App\Models\informacionalcaldia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class informacionalcaldias extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $info =[
            [
                'nombre_alcaldia' => 'N/D',
                'nombre_alcalde' => 'N/D',
                'direccion' => 'N/D',
                'telefono'=> 0,
                'correo'=> 'N/D',
                'correo_notificaciones'=> 'N/D',
                'contrasenia' => 'N/D',
            ],
        ];
        foreach ($info as $informa) {
            informacionalcaldia::forceCreate($informa);
        }
    }
}
