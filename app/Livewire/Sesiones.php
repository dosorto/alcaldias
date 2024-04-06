<?php

namespace App\Livewire;

use Livewire\Component;

class Sesiones extends Component
{
    public $Modal = false;
    
    public function render()
    {
        return view('livewire.sesiones');
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'monto_inicial' => 'required',
        ]);
        $validatedData['created_at'] = now();
        $validatedData['usuario_id'] = auth()->user()->id;

        SesionCaja::create($validatedDate);
        $this->dispatch('close-modal');
    }

    public function cancel()
    {
        $this->Modal = false;
    }
}
