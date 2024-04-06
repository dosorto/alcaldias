<?php

namespace App\Livewire;
use App\Models\Contribuyente;
use Livewire\WithPagination;
use Livewire\Component;
use Illuminate\Support\Facades\Redirect;

class Cobros extends Component
{
    use WithPagination;
    public $search;

    public function render()
    {
        $contribuyentes = Contribuyente::latest()->where(function($query) {
            $query->where('primer_nombre', 'like', '%'.$this->search.'%')
                ->orWhere('segundo_nombre', 'like', '%'.$this->search.'%')
                ->orWhere('primer_apellido', 'like', '%'.$this->search.'%')
                ->orWhere('segundo_apellido', 'like', '%'.$this->search.'%')
                ->orWhere('identidad', 'like', '%'.$this->search.'%');
        })->paginate(5);

        $recentlyAdded = $contribuyentes->isEmpty(); // Verifica si no se encontraron contribuyentes
        $message = $recentlyAdded ? "No se han encontrado contribuyentes." : "Contribuyentes agregados recientemente.";

        return view('livewire.cobros.cobros', compact('contribuyentes', 'recentlyAdded', 'message'));
    }

    public function redirectToCobroContribuyente($contribuyenteId)
    {
        // Redirigir a la página cobro-contribuyente.blade.php con el ID del contribuyente seleccionado
        return redirect()->route('cobro.contribuyente', ['contribuyente_id' => $contribuyenteId]);
    }
}
