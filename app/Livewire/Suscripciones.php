<?php

namespace App\Livewire;

use App\Models\suscripcion;
use App\Models\Contribuyente;
use App\Models\Servicio;
use Livewire\Component;
use Livewire\WithPagination;

class Suscripciones extends Component
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


    public function confirmItemDeletion( $id) 
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
                                        })->paginate(10);
        $servicios = Servicio::all();
        $suscripciones = suscripcion::all();
        return view('livewire.suscripciones.suscripciones', ['contribuyentes' => $contribuyentes, 'servicios' => $servicios, 'suscripciones' => $suscripciones]);
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
        $this->contribuyenteId = $id;
    }   
   
    public function store()
    {
        $validatedDate = $this->validate([
            'contribuyente_id' => 'required',
            'servicio_id' => 'required',
        ]);

        $validatedData['fecha_suscripcion'] = now();
  
        suscripcion::create($validatedDate);
  
        session()->flash('message', 'Se ha creado exitosamente');
        
        $this->closeModal();
        $this->dispatch('close-modal');
    }

    public function edit($id)
    {
        $this->updateModal = true;
        $suscripcion = suscripcion::findOrFail($id);
        $this->suscripcion_id = $id;
        $this->contribuyente_id = $suscripcion->contribuyente_id;
        $this->servicio_id = $suscripcion->servicio_id;
        $this->dispatch("open-edit");
    }

    public function closeModal()
    {
        $this->deleteModal = false;
        $this->createModal = false;
        $this->updateModal = false;
    }

    public function closeModalDelete()
    {
        $this->deleteModal = false;
    }

    public function cancel()
    {
        $this->updateModal = false;
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'contribuyente_id' => 'required',
            'servicio_id' => 'required',
        ]);
  
        $suscripciones = suscripcion::find($this->suscripcion_id);
        $suscripciones->update([
            'contribuyente_id' => $this->contribuyente_id,
            'servicio_id' => $this->servicio_id,
        ]);
  
        $this->updateModal = false;
  
        session()->flash('message', 'Registro actualizado exitosamente');
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
}
