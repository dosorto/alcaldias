<?php

namespace App\Livewire;

use App\Models\PagoServicios;
use App\Models\Contribuyente;
use App\Models\Servicio;
use App\Models\Suscripcion;

use Livewire\WithPagination;
use Livewire\Component;

class CobroContribuyentes extends Component
{
    use WithPagination;

    public bool $deleteSuscripcionModal = false;
    public $suscripcion_id, $search;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
    public $suscripcion;
    public $confirmingItemDeletion;

    public $contribuyente;
    public $contribuyenteId;
    public $nombrecompleto;
    public $identidad;
    public $sexo;
    public $telefono;
    public $email;
    public $selectedYear = null;

    public $availableYears;
    public $availableYearsFiltered = [];

    public $selectedService;
    public $estadoPago;
    public function mount()
    {
        // Verificar si ya hay una cookie 'contribuyente_id' establecida
        $contribuyenteIdCookie = request()->cookie('contribuyenteH_id');
    
        if ($contribuyenteIdCookie) {
            // Si hay una cookie 'contribuyente_id', asignar su valor a $contribuyenteId
            $this->contribuyenteId = $contribuyenteIdCookie;
        } else {
            // Si no hay una cookie 'contribuyente_id', establecer el valor inicial
            $this->contribuyenteId = session('ids');
    
            // Establecer la cookie 'contribuyente_id' con el valor de session('id')
            cookie()->queue('contribuyenteH_id', $this->contribuyenteId);
        }
    
        // Buscar el contribuyente por su ID
        $this->contribuyente = Contribuyente::findOrFail($this->contribuyenteId);
        $this->nombrecompleto = $this->contribuyente->primer_nombre . ' ' . $this->contribuyente->segundo_nombre . ' ' . $this->contribuyente->primer_apellido . ' ' . $this->contribuyente->segundo_apellido;
        $this->identidad = $this->contribuyente->identidad;
        $this->sexo = $this->contribuyente->sexo;
        $this->telefono = $this->contribuyente->telefono;
        $this->email = $this->contribuyente->email;
        $this->contribuyenteId = $this->contribuyente->id;
    
        // Declarar la variable $availableYearsFiltered
    
         // Obtener los años disponibles para filtrar
         $this->availableYearsFiltered = PagoServicios::selectRaw("DATE_FORMAT(fecha_pago, '%Y') as year")
             ->distinct()
             ->orderBy('year', 'desc')
             ->pluck('year');
    
        $additionalYears = [2023, 2022, 2021];
        $this->availableYearsFiltered = $this->availableYearsFiltered->merge($additionalYears)->sort()->reverse();
        
        // Obtener el estado de pago desde la sesión
        $this->estadoPago = session('estado_pago');
    }

    public function render()
    {
        // Obtener las suscripciones del contribuyente seleccionado
        $suscripciones = Suscripcion::where('contribuyente_id', $this->contribuyenteId)->get();
    
        // Construir la consulta base para los pagos de servicios
        $pagosQuery = PagoServicios::where('contribuyente_id', $this->contribuyenteId);
    
        // Aplicar filtro por año si está seleccionado
        if ($this->selectedYear) {
            $pagosQuery->whereRaw("DATE_FORMAT(fecha_pago, '%Y') = ?", [$this->selectedYear]);
        }
    
        // Aplicar filtro por servicio si está seleccionado
        if ($this->selectedService) {
            $pagosQuery->whereHas('servicios', function ($query) {
                $query->where('id', $this->selectedService);
            });
        }
    
        // Obtener los resultados de la consulta paginados
        $pagoservicio = $pagosQuery->paginate(5);
    
        // Obtener todos los servicios disponibles
        $servicios = Servicio::all();
    
        // Calcular el importe total de cada recibo
        foreach ($pagoservicio as $pago) {
            $totalRecibo = $pago->servicios()->sum('importes');
            $pago->importe_total = $totalRecibo;
        }
    
        // Verificar si no hay registros para el año seleccionado
        $noRegistros = $this->selectedYear && $pagoservicio->isEmpty();
    
        // Definir la variable $recentlyAdded
        $recentlyAdded = false; // Puedes establecer su valor según tu lógica
    
        return view('livewire.cobros.cobro-contribuyente', [
            'contribuyentes' => Contribuyente::all(),
            'servicios' => $servicios,
            'pagoservicio' => $pagoservicio,
            'suscripciones' => $suscripciones,
            'noRegistros' => $noRegistros,
            'recentlyAdded' => $recentlyAdded, // Agregar la variable aquí
            'estadoPago' => $this->estadoPago, // Asegúrate de incluir esto
        ]);
    }
    
    
    
 public function generarFactura($id)
 {
     $contribuyente = Contribuyente::findOrFail($id);
     $pagoservicio = PagoServicios::where('contribuyente_id', $id)->get();
     
     // Calcular el total de la factura
     $total_factura = 0;
     foreach ($pagoservicio as $pago) {
         $total_factura += $pago->importe_total;
     }
 
     return view('factura', compact('contribuyente', 'pagoservicio', 'total_factura'));
 }
 public function filtrarPorServicio($servicioId)
{
    // Filtra los pagos de servicios por el ID del servicio seleccionado
    $pagoservicioFiltrados = PagoServicio::whereHas('servicios', function ($query) use ($servicioId) {
        $query->where('servicio_id', $servicioId);
    })->get();

    
    return view('tu_vista', compact('pagoservicioFiltrados'));
}

public function obtenerEstadoPago($servicioId)
{
    // Buscar el registro de pago de servicio correspondiente al servicio y contribuyente actual
    $pagoServicio = PagoServicio::where('contribuyente_id', $this->contribuyente->id)
        ->where('servicio_id', $servicioId)
        ->first();

    // Si se encuentra un registro, devolver el estado de pago, de lo contrario devolver 'Pendiente'
    return $pagoServicio ? $pagoServicio->estado : 'Pendiente';
}






}
