<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\PagoServicios;
use App\Models\Contribuyente;
use Livewire\WithPagination; 

class ReporteIngresos extends Component
{
    use WithPagination;

    public $startDate;
    public $endDate;
    public $totalIngresos = 0; 

    public function render()
    {
        $pagoservicios = PagoServicios::select('pago_servicios.*', 'contribuyentes.primer_nombre', 'contribuyentes.primer_apellido')
            ->leftJoin('contribuyentes', 'pago_servicios.contribuyente_id', '=', 'contribuyentes.id');

        if ($this->startDate && $this->endDate) {
            $pagoservicios->whereBetween('fecha_pago', [$this->startDate, $this->endDate]);
        }

        $pagoservicios = $pagoservicios->paginate(5);

        $this->calcularTotalIngresos($pagoservicios); // Calcular el total de ingresos

        return view('livewire.Reporte', [
            'pagoservicios' => $pagoservicios,
            'totalIngresos' => $this->totalIngresos, // Pasar el total de ingresos a la vista
        ]);
    }

    // Método para calcular el total de ingresos
    public function calcularTotalIngresos($pagoservicios)
    {
        $this->totalIngresos = $pagoservicios->sum('total');
    }

    // Método para buscar
    public function buscar()
    {
        $this->resetPage(); // Reinicia la paginación a la primera página
        // Puedes añadir lógica adicional si es necesario
    }

    // Método para mostrar todos los datos
    public function mostrarTodos()
    {
        $this->startDate = null;
        $this->endDate = null;
    }
}