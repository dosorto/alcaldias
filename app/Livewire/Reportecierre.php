<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contribuyente;
use App\Models\OperacionesSesion;
use App\Models\SesionCajaModelo;
use App\Models\SesionCaja;
use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\WithPagination;

class Reportecierre extends Component
{
    use WithPagination;

    public $montoInicial;
    public $fechainiciocaja;
    public $totalOperaciones;
    public $totalCaja;
    public $diferencia;
    public $cierreCajaCuadra;
    public $usuario;
    public $operacionesSesion;
    public $montoCierreUser;
    public $inputEnabled = true;
    public $botonHabilitado = true;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
    public $Modal;

    public function mount()
    {
        $sesionCaja = SesionCajaModelo::where('status', '1')->first();
        $this->operacionesSesion = OperacionesSesion::where('idsesioncaja', $sesionCaja->id)->get();
        
        $this->montoInicial = $sesionCaja->monto_inicial;
        $this->fechainiciocaja = $sesionCaja->created_at;
        $this->totalOperaciones = $this->operacionesSesion->sum('monto'); // Corregido para usar $this->operacionesSesion
        $this->totalCaja = $this->montoInicial + $this->totalOperaciones;
        //$this->diferencia = $this->moneyInCash - $this->totalCaja; // ¿Dónde está definido moneyInCash?
        $this->cierreCajaCuadra = ($this->diferencia == 0);
        $this->usuario = User::find($sesionCaja->usuario_id);
    }

    public function render()
    {
        return view('livewire.cobros.reportecierre', [
            'montoInicial' => $this->montoInicial,
            'totalOperaciones' => $this->totalOperaciones,
            'totalCaja' => $this->totalCaja,
            'cierreCajaCuadra' => $this->cierreCajaCuadra,
            'fechainiciocaja' => $this->fechainiciocaja,
            'operacionesSesion' => $this->operacionesSesion,
            'usuario' => $this->usuario,
        ]);
    }

    public function openModal()
    {
        $this->createModal = true;
    }

    public function closeModal()
    {
        $this->createModal = false;
    }

    public function cerrarSesionCaja()
    {
        $sesionCaja = SesionCajaModelo::where('status', '1')->first();
        $sesionCaja->update([
            'closed_at' => now(),
            'status' => 0,
            'monto_cierresis' => $this->totalCaja,
            'monto_cierreuser' => $this->montoCierreUser,
        ]);
        $this->inputEnabled = false;
        $this->botonHabilitado = false;
        // Aquí podrías agregar más acciones si es necesario, como redireccionar a otra página, mostrar un mensaje, etc.
        //$this->createModal = true;
        // Limpiar los campos del formulario después de cerrar la sesión
        $this->reset(['montoCierreUser']);
        
        //$this->openModal();
        return redirect()->to('/reportecierrefactura');

    }
}
