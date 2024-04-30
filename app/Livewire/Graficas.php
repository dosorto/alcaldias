<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contribuyente;
use App\Models\Servicio;
use App\Models\PagoServicios;

class Graficas extends Component
{
    public function render()
    {
        // Obtener el total de contribuyentes
        $totalContribuyentes = Contribuyente::count();
    
        // Obtener el último contribuyente agregado
        $ultimoContribuyente = Contribuyente::latest()->first();

          // Obtener el total de servicios
         $totalservicio = Servicio::count();
    
    
        // Obtener el contribuyente con el pago más alto
        // $contribuyenteMasPago = Contribuyente::withSum('pagoservicios', 'monto')->orderByDesc('pagoservicios_sum_monto')->first();
    
        // Obtener el servicio más pagado
        // $servicioMasPagado = PagoServicio::groupBy('servicio_id')->select('servicio_id', PagoServicios::raw('SUM(monto) as total'))->orderByDesc('total')->first();
    
        // Obtener el total de ingresos
        // $totalIngresos = PagoServicio::sum('monto');
    
        // Obtener la lista de pagos de servicios paginada
        // $pagoservicios = PagoServicio::with('contribuyente')->paginate(5);
    
        return view('livewire.graficas', [
            'totalContribuyentes' => $totalContribuyentes,
            'ultimoContribuyente' => $ultimoContribuyente,
            // 'contribuyenteMasPago' => $contribuyenteMasPago,
            // 'servicioMasPagado' => $servicioMasPagado,
            // 'totalIngresos' => $totalIngresos,
            // 'pagoservicios' => $pagoservicios,
            'totalservicio' => $totalservicio,
        ]);
    }

}