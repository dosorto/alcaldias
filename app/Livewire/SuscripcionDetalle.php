<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Contribuyente;
use App\Models\Servicio;
use App\Models\suscripcion;

class SuscripcionDetalle extends Component
{
    public $servicioId;
    public $contribuyenteId;

    public $modalDelete = false;
    public $confirmarDelete;

    public function mount($id)
    {
        $this->contribuyenteId = $id;
    }

    public function render()
    {
        // Buscar el contribuyente por su ID
        $contribuyente = Contribuyente::findOrFail($this->contribuyenteId);
        $servicios = Servicio::all();
        $suscripciones = suscripcion::all();

        // Pasar los datos del contribuyente a la vista
        return view('livewire.suscripciones.detallesuscripcion', ['contribuyente' =>$contribuyente, 'servicios'=>$servicios, 'suscripciones'=>$suscripciones]);
    }

    public function agregarServicio()
    {
        // Verificar si el servicio ya está suscrito por el contribuyente
        $suscripcionExistente = Suscripcion::where('contribuyente_id', $this->contribuyenteId)
                                                ->where('servicio_id', $this->servicioId)
                                                ->exists();

        // Si el servicio ya está suscrito, retornar con un mensaje de error
        if ($suscripcionExistente) {
            session()->flash('error', 'Este servicio ya está suscrito por el contribuyente.');
            return;
        }

        if($this->servicioId){

        // Crear una nueva suscripción
        suscripcion::create([
            'contribuyente_id' => $this->contribuyenteId,
            'servicio_id' => $this->servicioId,
            'fecha_suscripcion' => now(), // Puedes cambiar esto según tus necesidades
        ]);
        

        // Redirigir con un mensaje de éxito
        session()->flash('success', 'Servicio agregado exitosamente.');
        }
    }

    public function opendelete($sus_delete_id)
    {
        $this->modalDelete = true;
        $this->confirmarDelete = $sus_delete_id;
    }

    public function eliminarSuscripcion()
    {
        $suscripcion = Suscripcion::findOrFail($this->confirmarDelete);
        
        // Eliminar la suscripción
        if ($suscripcion->contribuyente_id = $this->contribuyenteId) {
            $suscripcion->delete();
        }
        $this->modalDelete = false;

        // Redirigir con un mensaje de éxito
        session()->flash('success', 'Servicio eliminado exitosamente.');
    }

    public function closeDelete()
    {
        $this->modalDelete = false;
    }
}
