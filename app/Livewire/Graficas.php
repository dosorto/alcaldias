<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contribuyente;
use App\Models\Servicio;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB; 


use App\Models\PagoServicios;

class Graficas extends Component
{

    public $contribuyentes;

    public function render()
    {
        // Obtener el total de contribuyentes
        $totalContribuyentes = Contribuyente::count();
    
        // Obtener el último contribuyente agregado
        $ultimoContribuyente = Contribuyente::latest()->first();

          // Obtener el total de servicios
         $totalservicio = Servicio::count();

         $totaluser =User::count();
    
    
        // Obtener el contribuyente con el pago más alto
        // $contribuyenteMasPago = Contribuyente::withSum('pagoservicios', 'monto')->orderByDesc('pagoservicios_sum_monto')->first();
        $resultado = DB::table('pago_servicio_has_servicios')
        ->select('servicio_id', DB::raw('SUM(total) as total'))
        ->join('pago_servicios', 'pago_servicio_has_servicios.pago_servicio_id', '=', 'pago_servicios.id')
        ->where('pago_servicios.estado', 'Pagado') // Filtrar por estado "Pagado"
        ->groupBy('servicio_id')
        ->orderByDesc('total')
        ->first();
    
    if ($resultado) {
        $servicioMasPagadoId = $resultado->servicio_id;
        $nombreServicioMasPagado = Servicio::find($servicioMasPagadoId)->nombre_servicio ?? null;
    } else {
        $nombreServicioMasPagado = 'Sin servicio';
    }
//  ESTA ES LA FUNCION PERO POR MOTIVOS QUE MYSQL YA ESTA EN MAYO NO ME TRAE LOS RESULTADOS 

//    $totalIngresos = PagoServicios::where('estado', 'Pagado')
//    ->whereBetween(
//        DB::raw("STR_TO_DATE(fecha_pago, '%Y-%m-%d')"),
//        [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()]
//    )
//    ->sum('total');

// ESTA ES UNA CONSULTA TEMPORAL 

   $totalIngresos = PagoServicios::where('estado', 'Pagado')->sum('total');

// TRAE LA LISTA DE LOS ULTIMOS 10 CONTRIBUYENTES PAGINADAS DE 5 EN 5 

    $ultimosContribuyentes = Contribuyente::latest()->take(10)->paginate(5);

       
    
        // Obtener la lista de pagos de servicios paginada
        // $pagoservicios = PagoServicio::with('contribuyente')->paginate(5);
    
        return view('livewire.graficas', [
            'totalContribuyentes' => $totalContribuyentes,
            'ultimoContribuyente' => $ultimoContribuyente,
            // 'contribuyenteMasPago' => $contribuyenteMasPago,
            'servicioMasPagado' => $nombreServicioMasPagado,
            'totalIngresos' => $totalIngresos,
            // 'pagoservicios' => $pagoservicios,
            'totalservicio' => $totalservicio,
            'ultimosContribuyentes' => $ultimosContribuyentes,

            'totaluser' => $totaluser,
        ]);
    }

}