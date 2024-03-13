<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contribuyente;
use App\Models\Departamento;
use App\Models\Tipo_documento;
use App\Models\Municipio;
use App\Models\Paise;
use App\Models\Barrio;

class Contribuyentes extends Component
{
    use WithPagination;
    public $search;
    public $createModal = false;

    public $tipo_documentos;

    public $SelectPais = NULL;
    public $departamentos;
    public $paises;
    public $barrios;

    public $pais_id;

    public function mount(){
        $this->tipo_documentos = Tipo_documento::all();
        $this->paises = paise::all();
        $this->departamentos = [];
        $this->barrios = barrio::all();
    }

    public function updatedSelectPais(){
        $this->departamentos = Departamento::where('pais_id', $this->pais_id)->get();

    }
    public function render()
    {
        $contribuyentes = Contribuyente::where('primer_nombre','like','%'. $this->search.'%')->paginate(1);
        return view('livewire.contribuyente.contribuyente',compact('contribuyentes'));
    }

    


    public function openModalCreate()
    {
        $this->createModal=true;
    }
    public function closeModal()
    {
        $this->createModal = false;
    }
}
