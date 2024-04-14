<?php

namespace App\Livewire;
use App\Models\Contribuyente;
use App\Models\OperacionesSesion;
use App\Models\SesionCajaModelo;
use App\Models\SesionCaja;
use Livewire\WithPagination;

use Livewire\Component;

class Cobros extends Component
{
    use WithPagination;
    public $search;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
    public $moneyInCash = 0;
    public $initialAmount;
    
    public function store()
    {
        $validatedDate = $this->validate([
            'monto_inicial' => 'required',
        ]);

        $validatedDate['usuario_id'] = auth()->user()->id;
        $validatedDate['created_at'] = now();
        $validatedDate['status'] = 1;

        SesionCaja::create($validatedDate);
  
        session()->flash('message', 'Se ha iniciado sesión exitosamente');
        $this->Modal = false;
      
    }

    public function render()
    {

        $sesionCaja = SesionCajaModelo::where('status', '1')->first();
        $operacionesSesion = OperacionesSesion::where('idsesioncaja', $sesionCaja->id)->get();
        
        $montoInicial = $sesionCaja->monto_inicial;
        $totalOperaciones = $operacionesSesion->sum('monto');
        $totalCaja = $montoInicial + $totalOperaciones;
        $diferencia = $this->moneyInCash - $totalCaja;
        $cierreCajaCuadra = ($diferencia == 0);
        $contribuyentes = Contribuyente::where(function($query) {
            $query->where('primer_nombre', 'like', '%'.$this->search.'%')
            ->orWhere('segundo_nombre', 'like', '%'.$this->search.'%')
            ->orWhere('primer_apellido', 'like', '%'.$this->search.'%')
            ->orWhere('segundo_apellido', 'like', '%'.$this->search.'%')
            ->orWhere('identidad', 'like', '%'.$this->search.'%');
            })->paginate(5);
    
        return view('livewire.cobros.cobros', [
            'montoInicial' => $montoInicial,
            'totalOperaciones' => $totalOperaciones,
            'totalCaja' => $totalCaja,
            //'diferencia' => $diferencia,
            'cierreCajaCuadra' => $cierreCajaCuadra,
            'contribuyentes' => $contribuyentes,
        ]);
        
        //return view('livewire.cobros.cobros', ['contribuyentes' => $contribuyentes]);
    }

    public function openModal()
    {
        // Llamar a la función para obtener la información de cierre de caja
        $cierreCajaInfo = $this->updateCierreCaja();

        // Asignar los resultados a las propiedades del componente Livewire
        $this->montoInicial = $cierreCajaInfo['montoInicial'];
        $this->totalOperaciones = $cierreCajaInfo['totalOperaciones'];
        // Asigna otras variables aquí...
        $this->createModal = true;
    }

    public function openModalWithInitialAmount($initialAmount)
    {
        $this->initialAmount = $initialAmount;
        $this->createModal = true;
        //$this->openModal();
    }

    public function closeModal()
    {
        $this->createModal = false;
    }

    public function updateCierreCaja()
{
    // Obtener el monto inicial de la sesión de caja activa
    $sesionCaja = SesionCajaModelo::where('status', '1')->first();
    $montoInicial = $sesionCaja->monto_inicial;

    // Obtener la suma total de los montos de las operaciones de la sesión de caja
    $totalOperaciones = OperacionesSesion::where('idsesioncaja', $sesionCaja->id)
        ->sum('monto');

    // Calcular el total en caja sumando el monto inicial y el total de operaciones
    $totalCaja = $montoInicial + $totalOperaciones;

    // Comparar el total en caja con el dinero en efectivo ingresado
    $diferencia = $this->moneyInCash - $totalCaja;

    // Determinar si el cierre de caja cuadra o no
    $cierreCajaCuadra = ($diferencia == 0) ? true : false;

    // Aquí podrías almacenar esta información en la base de datos o hacer lo que necesites con ella
    // Por ejemplo, podrías tener un modelo específico para el cierre de caja y almacenar los resultados allí

    // Retornar los resultados para mostrar en el modal
    return [
        'montoInicial' => $montoInicial,
        'totalOperaciones' => $totalOperaciones,
        'totalCaja' => $totalCaja,
        'diferencia' => $diferencia,
        'cierreCajaCuadra' => $cierreCajaCuadra,
    ];
}

    public function imprimirFactura()
    {
 
        $sesionCaja = SesionCajaModelo::where('status', '1')->first();
        $operacionesSesion = OperacionesSesion::where('idsesioncaja', $sesionCaja->id)->get();
        
        $montoInicial = $sesionCaja->monto_inicial;
        $totalOperaciones = $operacionesSesion->sum('monto');
        $totalCaja = $montoInicial + $totalOperaciones;
        $diferencia = $this->moneyInCash - $totalCaja;
        $cierreCajaCuadra = ($diferencia == 0);

    // Devolver una vista con el diseño de la factura
    return view('facturacierrecaja', compact('montoInicial', 'totalOperaciones', 'totalCaja', 'cierreCajaCuadra'));
    }

}