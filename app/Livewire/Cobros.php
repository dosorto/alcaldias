<?php

namespace App\Livewire;
use App\Models\Contribuyente;
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
        $validatedData = $this->validate([
            'monto_inicial' => 'required',
        ]);

        $validatedData['usuario_id'] = auth()->user()->id;
        $validatedData['created_at'] = now();
        $validatedData['status'] = true; // Establecer status como true por defecto

        try {
            SesionCaja::create($validatedData);
            $this->Modal = false;
            $this->monto_inicial = null;
            
            // Redirigir a la ruta /cobros después de abrir la sesión de caja
            return Redirect::to('/cobros');
        } catch (\Exception $e) {
            session()->flash('error', 'Error al crear la sesión de caja.');
        }
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