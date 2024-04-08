<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SesionCaja;
use Illuminate\Support\Facades\Redirect;

class Sesiones extends Component
{
    public $Modal = false;
    public $monto_inicial;
    protected $listeners = ['openModal'];

    public function openModal()
    {
        $this->Modal = false;
    }
    
    public function render()
    {
        return view('livewire.sesiones');
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
            
        
        } catch (\Exception $e) {
            session()->flash('error', 'Error al crear la sesión de caja.');
        }
    }

    public function cancel()
    {
        $this->Modal = false;
    }

}
