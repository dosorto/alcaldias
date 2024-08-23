<?php

namespace App\Http\Controllers;

use App\Models\Tipo_documento;
use App\Http\Controllers\ApiController;

class TipoDocumentoController extends ApiController
{
    // Obtener todos los tipos de documento
    public function index()
    {
        $tiposDocumento = Tipo_documento::all();
        return $this->successResponse('Lista de tipos de documentos obtenida correctamente', $tiposDocumento );
    }

    // Obtener un tipo de documento por su nombre
    public function showByName($name)
    {
        $tipoDocumento = Tipo_documento::where('tipo_documento', $name)->first();
        if ($tipoDocumento) {
            return $this->successResponse('Tipo de documentos obtenida correctamente', $tipoDocumento );
        } else {
            return $this->errorResponse('No Disponible.', ['error'=>'No se encontro tipo de documento'], 500);
        }
    }
}
