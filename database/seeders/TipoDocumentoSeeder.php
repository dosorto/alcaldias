<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tipo_documento;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tipo_documento = [
            [
                'tipo_documento' => 'DNI',
                'created_by'=> 1,
            ],
            [
                'tipo_documento' => 'Licencia de conducir',
                'created_by'=> 1,
            ],
            [
                'tipo_documento' => 'Actos civiles',
                'created_by'=> 1,
            ],
            [
                'tipo_documento' => 'Pasaporte',
                'created_by'=> 1,
            ],
            [
                'tipo_documento' => 'Visa',
                'created_by'=> 1,
            ],
            [
                'tipo_documento' => 'Antecedenetes penales',
                'created_by'=> 1,
            ],
            [
                'tipo_documento' => 'RTN',
                'created_by'=> 1,
            ],
            [
                'tipo_documento' => 'Antecedenetes penales',
                'created_by'=> 1,
            ]
 
        ];
            foreach ($tipo_documento as $tipo_doc) {
                Tipo_documento::forceCreate($tipo_doc);
            }
    }
}