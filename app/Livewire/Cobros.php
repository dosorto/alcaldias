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

   
}