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
    
       // Obtener el ID del servicio más pagado
       $servicioMasPagadoId = DB::table('pago_servicio_has_servicios')
       ->select('servicio_id', DB::raw('SUM(total) as total'))
       ->join('pago_servicios', 'pago_servicio_has_servicios.pago_servicio_id', '=', 'pago_servicios.id')
       ->groupBy('servicio_id')
       ->orderByDesc('total')
       ->first()->servicio_id;
   

   // Obtener el nombre del servicio más pagado
   $nombreServicioMasPagado = Servicio::find($servicioMasPagadoId)->nombre_servicio ?? null;


        // Obtener el total de ingresos
        $totalIngresos = PagoServicios::whereBetween('fecha_pago', [Carbon::now()->subMonth()->startOfMonth(), Carbon::now()->subMonth()->endOfMonth()])
            ->sum('total');

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