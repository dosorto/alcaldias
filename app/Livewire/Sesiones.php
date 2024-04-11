<?php

namespace App\Livewire;
use App\Models\SesionCaja;

use Livewire\Component;

class Sesiones extends Component
{
    public $Modal = false;
    public $monto_inicial;

    public function render()
    {
        return view('livewire.sesiones');
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

}
