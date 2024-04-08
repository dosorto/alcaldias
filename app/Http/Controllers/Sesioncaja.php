<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Contribuyente;
use App\Models\Servicio;
use App\Models\suscripcion;
use App\Models\Sesioncajamodelo;
use App\Models\PagoServicio_has_servicios;
use App\Models\PagoServicios;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;


class Sesioncaja extends Controller
{
   
    public $servicioId;
    public $contribuyenteId;
    public $timestamps = false;

    public function show($id)
    {
        // Buscar el contribuyente por su ID
        $contribuyente = Contribuyente::findOrFail($id);
        $servicios = Servicio::all();
        $suscripciones = suscripcion::all();
        $pagoservicios = PagoServicios::where('contribuyente_id', $id)->get();

        $totalAPagar = DB::table('pago_servicios')->where('contribuyente_id', $id)->sum('total');

        // Pasar los datos del contribuyente a la vista
        return view('sesioncaja', compact('contribuyente', 'servicios', 'suscripciones', 'pagoservicios', 'totalAPagar'));
    }

    public function imprimirFactura($id)
    {
    // Obtener datos necesarios para la factura
    $contribuyente = Contribuyente::findOrFail($id);
    $pagoservicios = PagoServicios::where('contribuyente_id', $id)->get();
    $totalAPagar = PagoServicios::where('contribuyente_id', $id)->sum('total');

    // Devolver una vista con el diseño de la factura
    return view('facturacaja', compact('contribuyente', 'pagoservicios', 'totalAPagar'));
    }

    public function store(Request $request)
    {
        // Validar datos del formulario
        $request->validate([
            'monto_inicial' => 'required|numeric',
        ]);

        // Obtener el usuario autenticado
        $usuario_id = Auth::id();

        // Crear una nueva sesión en la caja
        $sesion = new Sesioncajamodelo();
        $sesion->usuario_id = $usuario_id;
        $sesion->monto_inicial = $request->input('monto_inicial');
        $sesion->created_at = Carbon::now();
        $sesion->status = true; // Indicar que la sesión está activa
        $sesion->save();

        // Redireccionar a la página actual o a donde desees
        return redirect()->back()->with('message', 'Sesión iniciada correctamente.');
    }


}
