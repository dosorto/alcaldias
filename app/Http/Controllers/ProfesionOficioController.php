<?php

namespace App\Http\Controllers;

use App\Models\Profesion_oficio;
use App\Http\Controllers\ApiController;

class ProfesionOficioController extends ApiController
{
    // Obtener todas las profesiones y oficios
    public function index()
    {
        $profesiones = Profesion_oficio::all();
        return $this->successResponse('Lista de profesiones obtenida correctamente', $profesiones );
    }

    // Obtener una profesión u oficio por su nombre
    public function showByName($name)
    {
        $profesion = Profesion_oficio::where('nombre', $name)->first();
        if ($profesion) {
            return $this->successResponse('Profesion obtenida correctamente', $profesion );
        } else {
            return $this->errorResponse('No Disponible.', ['error'=>'No se encontro profesion'], 500);
        }
    }
}

