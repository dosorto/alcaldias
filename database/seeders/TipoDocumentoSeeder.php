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
                'tipo_documento' => 'Declaración de impuestos',
                'created_by'=> 1,
            ],
            [
                'tipo_documento' => 'Facturas y recibos',
                'created_by'=> 1,
            ],
            [
                'tipo_documento' => 'Estado de cuenta bancaria',
                'created_by'=> 1,
            ],
            [
                'tipo_documento' => 'Contratos',
                'created_by'=> 1,
            ],
            [
                'tipo_documento' => 'Certificados y documentos legales',
                'created_by'=> 1,
            ],
            [
                'tipo_documento' => 'Registros contables',
                'created_by'=> 1,
            ]
        ];
            foreach ($tipo_documento as $tipo_doc) {
                Tipo_documento::forceCreate($tipo_doc);
            }
    }
}