<?php

namespace App\Livewire;
use App\Models\Contribuyente;
use App\Models\OperacionesSesion;
use App\Models\SesionCajaModelo;
use App\Models\SesionCaja;
use App\Models\User;
use Livewire\WithPagination;
use Illuminate\Support\Facades\DB;

use Livewire\Component;

class Cobros extends Component
{
    use WithPagination;
    public $search;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
    public $initialAmount;
    public $monto_cierreuser;
    public $totalCaja;
    public $dineroTotal;
    public $monto_inicial;
    public $contribuyentes;

    
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

    public function mount()
    {
        // Consulta SQL para obtener los contribuyentes con pagos pendientes
        $this->contribuyentes = DB::table('contribuyentes')
        ->join('pago_servicios', 'contribuyentes.id', '=', 'pago_servicios.contribuyente_id')
        ->select('contribuyentes.*')
        ->where('pago_servicios.estado', 'Pendiente')
        ->distinct()
        ->get();
    }

    public function render()
    {
        return view('livewire.cobros.cobros');
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
        $fechainiciocaja = $sesionCaja->created_at;
        $totalOperaciones = $operacionesSesion->sum('monto');
        $totalCaja = $montoInicial + $totalOperaciones;
        //$diferencia = $this->moneyInCash - $totalCaja;
        //$cierreCajaCuadra = ($diferencia == 0);
        $usuario = User::find($sesionCaja->usuario_id);

    // Devolver una vista con el diseño de la factura
    return view('facturacierrecaja', compact('montoInicial', 'totalOperaciones', 'totalCaja', 'fechainiciocaja', 'operacionesSesion', 'usuario'));
    }

    public function cerrarSesionCaja()
    {
        // Validar el monto ingresado
        $this->validate([
            'dineroTotal' => 'required|numeric|min:0',
        ]);
    
        // Obtener la sesión de caja activa
        $sesionCaja = SesionCajaModelo::where('status', 1)->firstOrFail();
    
        // Actualizar los datos de la sesión de caja
        $sesionCaja->update([
            'close_at' => now(), // Guardar la fecha de cierre
            'status' => 0, // Actualizar el estado de 1 a 0
            'monto_cierresis' => $this->totalCaja, // Guardar el monto total en caja
            'monto_cierreuser' => $this->dineroTotal, // Guardar el monto ingresado por el usuario
        ]);

        // Mostrar un mensaje de éxito
        session()->flash('message', 'La sesión de caja se ha cerrado exitosamente.');
    
        // Redirigir o hacer cualquier otra acción necesaria
        return redirect()->to('/');
    }
    



}