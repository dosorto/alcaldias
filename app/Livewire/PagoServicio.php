<?php

namespace App\Livewire;

use App\Models\Anio;
use App\Models\suscripcion;
use App\Models\Contribuyente;
use App\Models\PagoServicio_has_Servicios;
use App\Models\Periodo;
use App\Models\Servicio;
use App\Models\PagoServicios;
use Livewire\Component;
use Livewire\WithPagination;
use Carbon\Carbon;

class PagoServicio extends Component
{
    use WithPagination;
    public bool $deletePagoServicioModal = false;
    public $pago_servicio_id, $search;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
    public $createModalPago = false;
    public $pagoServicio;
    public $confirmingItemDeletion;
    public $contribuyenteId;
    public $nombrecompleto;
    public $identidad;
    public $sexo;
    public $telefono;
    public $email;
    public $anio_id =1;
    public $periodo_id;
    public $direccion;
    public $periodo;
    public $servicioId;
    public $num_recibo;
    public $fechap;
    public $encargado;
    public $totalImportes;
    public $totalFormateado=0;
    public $valor_total;
    public $servicios_pagar = [];
    public $totalVer=0;
    public $totalFVer=0;
    public $alert = false;
    public $generar_pago = false;

    public function render()
    {
        $this->totalImportes = 0;
        $contribuyentes = Contribuyente::where(function($query) {
            $query->where('primer_nombre', 'like', '%'.$this->search.'%')
            ->orWhere('segundo_nombre', 'like', '%'.$this->search.'%')
            ->orWhere('primer_apellido', 'like', '%'.$this->search.'%')
            ->orWhere('segundo_apellido', 'like', '%'.$this->search.'%')
            ->orWhere('identidad', 'like', '%'.$this->search.'%');
            })->paginate(5);
        $servicios = Servicio::all();
        $suscripciones = suscripcion::all();



        return view('livewire.pago-servicio.pago-servicio', ['contribuyentes' => $contribuyentes, 'servicios' => $servicios, 'suscripciones' => $suscripciones,

                                                           ]);
    }

    public function updatedPeriodoId()
    {
        $this->alert = false;
        $this->servicios_pagar = [];
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


    public function store()
    {
        $validatedData['fecha_suscripcion'] = now();

        suscripcion::create([
            'servicio_id' => $this->servicioId,
            'contribuyente_id' => $this->contribuyenteId,
            'fecha_suscripcion' => now(),
        ]);

        $this->reset('servicioId');

        session()->flash('message', 'Se ha creado exitosamente');
    }

    public function closeModal()
    {
        $this->deleteModal = false;
        $this->createModal = false;
        $this->createModalPago = false;
        $this->updateModal = false;
        $this->anio_id = null;
        $this->periodo_id = null;
        $this->alert = false;
        $this->servicios_pagar = [];
    }

    public function remove($id)
    {
        $this->deleteModal = true;
        $this->confirmingItemDeletion = $id;
    }

    public function delete()
    {
        $suscripcion = suscripcion::find($this->confirmingItemDeletion);
        $suscripcion->delete();
        session()->flash('message', 'Registro eliminado exitosamente.');
        $this->deleteModal = false;
    }


    public function storePago()
    {
        // $validatedData['fecha_suscripcion'] = now();
        $total = $this->totalImportes;
        $ultimosDigitos = substr($this->identidad, 6);
        if($this->contribuyenteId){

        }
        $pago_servicio = PagoServicios::create([
            'num_recibo' => $this->num_recibo . '-' . $ultimosDigitos,
            'fecha_pago' => $this->fechap,
            'total' => $total,
            'periodo_id' => $this->periodo_id,
            'contribuyente_id' => $this->contribuyenteId,
            'fecha_suscripcion' => now(),
        ]);

        foreach ($this->servicios_pagar as $servicioId) {

            PagoServicio_has_Servicios::create([
                'pago_servicio_id' => $pago_servicio->id,
                'servicio_id' => $servicioId
            ]);
            }

        // $pago_servicio->servicios()->attach($this->serviciosSeleccionados);
        // // $this->reset('servicioId');
        $this->closeModal();

        session()->flash('message', 'Se ha creado exitosamente');
    }

    public function generarPagare($id){
         // Establecer el ID del contribuyente
        $this->contribuyenteId = $id;

        // Establecer la cookie 'contribuyente_id' con el nuevo ID
        cookie()->queue('contribuyente_id', $this->contribuyenteId);
        return redirect()->route('generar.pago')->with('id', $id);

    }

}
