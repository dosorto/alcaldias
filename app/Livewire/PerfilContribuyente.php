<?php

namespace App\Livewire;

use App\Models\suscripcion;
use App\Models\Contribuyente;
use App\Models\Servicio;
use Livewire\Component;
use Livewire\WithPagination;

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

    public $servicioId;


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
                                        })->paginate(5);
        $servicios = Servicio::all();
        $suscripciones = suscripcion::all();
        return view('livewire.perfil-contribuyentes.list-contribuyentes', ['contribuyentes' => $contribuyentes, 'servicios' => $servicios, 'suscripciones' => $suscripciones]);
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
        $this->deleteModal = false;
        $this->createModal = false;
        $this->updateModal = false;
    }
}
