<?php

namespace App\Livewire;

use App\Models\PagoServicios;
use App\Models\Contribuyente;
use App\Models\Servicio;
use App\Models\Suscripcion;

use Livewire\WithPagination;
use Livewire\Component;

class HistorialContribuyente extends Component
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
    public $selectedYear = null;

    public $availableYears;

    public function mount()
    {
        $this->contribuyenteId = 1; // O cualquier otro ID válido
        $this->showHistory($this->contribuyenteId);
    }

    public function updatePagos()
    {
        // Llama a showHistory() para actualizar los datos del historial de pagos
        $this->showHistory($this->contribuyenteId);
        // Retorna la vista renderizada
        return $this->render();
    }

    public function selectContribuyente($id)
    {
        $this->contribuyenteId = $id;
        $this->showHistory($this->contribuyenteId);
    }
    public function showHistory($id)
    {
        // Buscar el contribuyente por su ID
        $contribuyente = Contribuyente::findOrFail($id);
        $this->nombrecompleto = $contribuyente->primer_nombre . ' ' . $contribuyente->segundo_nombre . ' ' . $contribuyente->primer_apellido . ' ' . $contribuyente->segundo_apellido;
        $this->identidad = $contribuyente->identidad;
        $this->sexo = $contribuyente->sexo;
        $this->telefono = $contribuyente->telefono;
        $this->email = $contribuyente->email;
        $this->contribuyenteId = $contribuyente->id;
    
        // Declarar la variable $availableYearsFiltered
        $availableYearsFiltered = [];
    
        // Obtener los años disponibles para filtrar
        $availableYearsFiltered = PagoServicios::selectRaw('YEAR(fecha_pago) as year')
            ->distinct()
            ->orderBy('year', 'desc')
            ->pluck('year');
    
        $additionalYears = [2023, 2022, 2021];
        $availableYearsFiltered = $availableYearsFiltered->merge($additionalYears)->sort()->reverse();
    
        $pagosQuery = PagoServicios::where('contribuyente_id', $id);
    
        // Aplicar filtro por año si está seleccionado
        if ($this->selectedYear) {
            $pagosQuery->whereYear('fecha_pago', $this->selectedYear);
        }
    
        // Obtener los resultados de la consulta paginados
        $pagoservicio = $pagosQuery->paginate(5);
    
        // Obtener las suscripciones del contribuyente seleccionado
        $suscripciones = Suscripcion::where('contribuyente_id', $id)->get();
    
        // Obtener todos los servicios disponibles
        $servicios = Servicio::all();
    
        // Calcular el importe total de cada recibo
        foreach ($pagoservicio as $pago) {
            $totalRecibo = $pago->servicios()->sum('importes');
            $pago->importe_total = $totalRecibo;
        }
    
        // Determinar si no hay registros para el año seleccionado
        $noRegistros = $this->selectedYear && $pagoservicio->isEmpty();
    
        // Pasar los datos a la vista
        return view('historial-contribuyente', compact('contribuyente', 'servicios', 'pagoservicio', 'suscripciones', 'availableYearsFiltered', 'noRegistros'));
    }
    
    public function render()
    {
        // Aquí deberías tener lógica para obtener los datos necesarios para renderizar la vista de historial de contribuyentes
        // Por ejemplo:
        $contribuyentes = Contribuyente::all();
        $servicios = Servicio::all();
        $pagoservicio = PagoServicios::paginate(5);

        
        return view('livewire.historial-contribuyente', [
            'contribuyentes' => $contribuyentes,
            'servicios' => $servicios,
            'pagoservicio' => $pagoservicio,
        ]);
    }
}
