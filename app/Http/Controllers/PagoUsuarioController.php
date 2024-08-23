<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ApiController;

class PagoUsuarioController extends ApiController
{
    // Obtener pagos pendientes del usuario autenticado
    public function getPagosPendientes()
    {
        $user = Auth::user();

        if (!$user->contribuyente) {
            #No hay contribuyente
            return $this->errorResponse('No Disponible.', ['error'=>'Este usuario no tiene un contribuyente'], 500);
        }

        $contribuyente = $user->contribuyente;

        // Filtrar los pagos con estado 'pendiente' y cargar los servicios relacionados
        $pagosPendientes = $contribuyente->pagoServicios()
            ->where('estado', 'pendiente')
            ->with('servicios')  // Cargar la relación con los servicios
            ->get()
            ->map(function ($pago) {
                return [
                    'num_recibo' => $pago->num_recibo,
                    'fecha_pago' => $pago->fecha_pago,
                    'total' => $pago->total,
                    'estado' => $pago->estado,
                    'servicio' => $pago->servicios->first()->nombre_servicio,  // Obtener el primer (y único) nombre de servicio
                ];
            });

            return $this->successResponse('Lista de pagos obtenida correctamente', $pagosPendientes );
        
    }

    // Obtener pagos realizados del usuario autenticado
    public function getPagosRealizados()
    {
        $user = Auth::user();

        if (!$user->contribuyente) {
            #No hay contribuyente
            return $this->errorResponse('No Disponible.', ['error'=>'Este usuario no tiene un contribuyente'], 500);
        }

        $contribuyente = $user->contribuyente;

        // Filtrar los pagos con estado 'pagado' y cargar los servicios relacionados
        $pagosRealizados = $contribuyente->pagoServicios()
            ->where('estado', 'pagado')
            ->with('servicios')  // Cargar la relación con los servicios
            ->get()
            ->map(function ($pago) {
                return [
                    'num_recibo' => $pago->num_recibo,
                    'fecha_pago' => $pago->fecha_pago,
                    'total' => $pago->total,
                    'estado' => $pago->estado,
                    'servicio' => $pago->servicios->first()->nombre_servicio,  // Obtener el primer (y único) nombre de servicio
                ];
            });

            return $this->successResponse('Lista de pagos obtenida correctamente', $pagosRealizados );
    }
}
