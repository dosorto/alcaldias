<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contribuyente;
use App\Models\Servicio;
use App\Models\suscripcion;

class Detallesuscripcion extends Controller
{

    public $servicioId;
    public $contribuyenteId;

    public function show($id)
    {
        // Buscar el contribuyente por su ID
        $contribuyente = Contribuyente::findOrFail($id);
        $servicios = Servicio::all();
        $suscripciones = suscripcion::all();

        // Pasar los datos del contribuyente a la vista
        return view('detallesuscripcion', compact('contribuyente', 'servicios', 'suscripciones'));
    }


    public function agregarServicio(Request $request)
    {
        // Validar la solicitud
        $request->validate([
            'contribuyenteId' => 'required|exists:contribuyentes,id',
            'servicioId' => 'required|exists:servicios,id',
        ]);

        // Crear una nueva suscripción
        suscripcion::create([
            'contribuyente_id' => $request->contribuyenteId,
            'servicio_id' => $request->servicioId,
            'fecha_suscripcion' => now(), // Puedes cambiar esto según tus necesidades
        ]);

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Servicio agregado exitosamente.');
    }

    public function eliminarServicio($suscripcionId)
    {
        $suscripcion = Suscripcion::findOrFail($suscripcionId);
        
        // Eliminar la suscripción
        $suscripcion->delete();

        // Redirigir con un mensaje de éxito
        return redirect()->back()->with('success', 'Servicio eliminado exitosamente.');
    }

}
