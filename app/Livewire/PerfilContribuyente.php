<?php

namespace App\Livewire;
use Illuminate\Support\Facades\DB;

use App\Models\PagoServicios;
use App\Models\Contribuyente;
use App\Models\Servicio;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Profesion_oficio;
use App\Models\suscripcion;

class PerfilContribuyente extends Component
{
   use WithPagination;

    public bool $deleteSuscripcionModal = false;
    public $suscripcion_id, $search;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
    public $suscripcion;
    public $confirmingItemDeletion;

    public $contribuyenteId;
    public $nombrecompleto;
    public $identidad;
    public $sexo;
    public $telefono;
    public $email;

    public $profesion;

    public $servicioId;
    public $historialPagos;
    public $selectedYear;

    public $availableYears;



    public function confirmItemDeletion($id)
    {
        $this->confirmingItemDeletion = $id;
    }

    public function render()
    {
        $contribuyentes = Contribuyente::where(function($query) {
            $query->where('primer_nombre', 'like', '%'.$this->search.'%')
                ->orWhere('segundo_nombre', 'like', '%'.$this->search.'%')
                ->orWhere('primer_apellido', 'like', '%'.$this->search.'%')
                ->orWhere('segundo_apellido', 'like', '%'.$this->search.'%')
                ->orWhere('identidad', 'like', '%'.$this->search.'%');
        })->paginate(5);

        $servicios = Servicio::all();

        // Obtener los pagos de servicios del contribuyente seleccionado
        $pagosQuery = PagoServicios::where('contribuyente_id', $this->contribuyenteId);

        // Aplicar filtro por año si está seleccionado
        if ($this->selectedYear) {
            $pagosQuery->whereYear('fecha_pago', $this->selectedYear);
        }

        // Paginar los pagos de servicios del contribuyente seleccionado
        $pagoservicio = $pagosQuery->paginate(3);

        // Calcular el importe total de cada recibo y añadirlo al objeto de pago de servicios
        foreach ($pagoservicio as $pago) {
            $totalRecibo = $pago->servicios()->sum('importes');
            $pago->importe_total = $totalRecibo;
        }

        $availableYears = PagoServicios::selectRaw('YEAR(fecha_pago) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');

        return view('livewire.perfil-contribuyentes.list-contribuyentes', [
            'contribuyentes' => $contribuyentes,
            'servicios' => $servicios,
            'pagoservicio' => $pagoservicio,
            'availableYears' => $availableYears
        ]);
    }

    public function historial($id){
        // Establecer el ID del contribuyente
       $this->contribuyenteId = $id;

       // Establecer la cookie 'contribuyente_id' con el nuevo ID
       cookie()->queue('contribuyenteH_id', $this->contribuyenteId);
       return redirect()->route('contribuyente.showHistory')->with('ids', $id);
   }
}
