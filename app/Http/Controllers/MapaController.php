<?php

namespace App\Http\Controllers;

use App\Models\Georeferenciacion;
use Illuminate\Http\Request;
use App\Models\Propiedad;
use Maatwebsite\Excel\Concerns\ToArray;

class MapaController extends Controller
{
    public function mapa(Propiedad $propiedad)
    {
        $coordenadas = Georeferenciacion::where('IdPropiedad', intval($propiedad->id))->get();

        // convertir coordenadas a una matriz donde solo voy a guardar latitud y longitud
        $coordenadas = $coordenadas->map(function ($coordenada) {
            return [
                $coordenada->latitud,
                $coordenada->longitud
            ];
        });

        return view('mapa', compact('coordenadas'));
        return view('mapa', compact('coordenadas', 'propiedad'));
    }
}


