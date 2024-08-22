<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Propiedad;
use App\Models\Georeferenciacion;
use App\Http\Controllers\ApiController;

class PropiedadUsuarioController extends ApiController
{
    // Obtener las propiedades del contribuyente del usuario autenticado
    public function getPropiedades()
    {
        $user = Auth::user();

        if (!$user->contribuyente) {
            return $this->errorResponse('No Disponible.', ['error'=>'Este usuario no tiene un contribuyente'], 500);
        }

        $contribuyente = $user->contribuyente;

        // Obtener las propiedades del contribuyente con todas las relaciones necesarias
        $propiedades = Propiedad::where('IdContribuyente', $contribuyente->id)
            ->with([
                'Barrio',
                'Barrio.aldea.municipios.departamentos.paises',  // Relaciones anidadas
                'TipoPropiedad'
            ])
            ->get()
            ->map(function ($propiedad) {
                return [
                    'id' => $propiedad->id,
                    'ClaveCatastral' => $propiedad->ClaveCatastral,
                    'IdContribuyente' => $propiedad->IdContribuyente,
                    'Direccion' => $propiedad->Direccion,
                    'barrio_id' => $propiedad->Barrio->id,
                    'barrio' => $propiedad->Barrio->nombre,
                    'aldea' => $propiedad->Barrio->aldea->nombre,
                    'municipio' => $propiedad->Barrio->aldea->municipios->name,
                    'departamento' => $propiedad->Barrio->aldea->municipios->departamentos->name,
                    'pais' => $propiedad->Barrio->aldea->municipios->departamentos->paises->nombre,
                    'tipo_propiedad_id' => $propiedad->TipoPropiedad->id,
                    'tipo_propiedad' => $propiedad->TipoPropiedad->Nombre,
                ];
            });

            return $this->successResponse('Lista de propiedades obtenida correctamente', $propiedades );
    }

    // Método para obtener las georeferenciaciones de una propiedad específica
    public function getGeoreferenciaciones($propiedadId)
    {
         // Buscar las georeferenciaciones asociadas a la propiedad, seleccionando solo los campos necesarios
        $georeferenciaciones = Georeferenciacion::where('IdPropiedad', $propiedadId)
            ->get(['id', 'latitud', 'longitud']); // Selecciona solo los campos id, latitud y longitud

        // Si no se encuentran georeferenciaciones, devolver un mensaje de error
        if ($georeferenciaciones->isEmpty()) {
            return $this->errorResponse('No Disponible.', ['error'=>'No hay Georeferencias registradas para esta propiedad'], 500);
        }

        // Devolver las georeferenciaciones en formato JSON
        return $this->successResponse('Lista de coordenadas obtenida correctamente', $georeferenciaciones );
    }
}

