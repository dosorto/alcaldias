<?php

namespace App\Livewire;
use App\Models\Contribuyente;
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
    public $Modal = false;
    public $showModal = false;
    public $monto_inicial;
    protected $listeners = ['openModal'];

   
    public function nuevoModal()
    {
        $this->createModal=true;
    }
    
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

    public function cancel()
    {
        $this->Modal = false;
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
        return view('livewire.cobros.cobros', ['contribuyentes' => $contribuyentes]);
    }

    public function openModal()
    {
        $this->emit('openModal');
    }


}