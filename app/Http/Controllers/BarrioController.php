<?php

namespace App\Http\Controllers;

use App\Models\Barrio;
use App\Http\Controllers\ApiController;

class BarrioController extends ApiController
{
    // Obtener todos los barrios
    public function index()
    {
        $barrios = Barrio::all();
        return $this->successResponse('Lista de barrios obtenida correctamente', $barrios );
    }

    // Obtener un barrio por su nombre
    public function showByName($name)
    {
        $barrio = Barrio::where('nombre', $name)->first();
        if ($barrio) {
            return $this->successResponse('Barrio obtenida correctamente', $barrio );
        } else {
            return $this->errorResponse('No disponible.', ['error'=>'No se encontro barrio'], 500);
        }
    }
}
