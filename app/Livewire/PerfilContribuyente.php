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

   // public $suscripciones;

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


        $suscripciones = Suscripcion::with('servicios')->get();

        
        // Obtener las suscripciones del contribuyente actual
        $pagosQuery = PagoServicios::where('contribuyente_id', $this->contribuyenteId);
    
        // Aplicar filtro por año si está seleccionado
        if ($this->selectedYear) {
            $pagosQuery->whereYear('fecha_pago', $this->selectedYear);
        }
    
        // Paginar las suscripciones del contribuyente actual
        $pagoServicios = $pagosQuery->paginate(3);
    
        // Calcular el importe total de cada recibo y añadirlo al objeto de pago de servicios
        foreach ($pagoServicios as $pago) {
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
            'pagoServicios' => $pagoServicios,
            'suscripciones'=>$suscripciones,
            'availableYears' => $availableYears
        ]);
    }
    
    public function updateSuscripciones()
    {
        $this->render(); 
    }

    public function openModalCreate($id)
    {
        $this->createModal = true;
        $contribuyente = Contribuyente::findOrFail($id);

        $this->nombrecompleto = $contribuyente->primer_nombre . ' ' . $contribuyente->segundo_nombre . ' ' . $contribuyente->primer_apellido . ' ' . $contribuyente->segundo_apellido;
        $this->identidad = $contribuyente->identidad;
        $this->sexo = $contribuyente->sexo;
        $this->telefono = $contribuyente->telefono;
        $this->email = $contribuyente->email;
        $this->contribuyenteId = $contribuyente->id;
    }

    public function closeModal()
    {
        $this->selectedYear = null;
        $this->resetPage();
   
        $this->deleteModal = false;
        $this->createModal = false;
        $this->updateModal = false;

        $this->render();
    }

    public function mount()
    {
        $this->availableYears = PagoServicios::selectRaw('YEAR(fecha_pago) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
        $this->availableYears->push(2023);
        $this->availableYears->push(2022);
        $this->availableYears->push(2021);
    }
}