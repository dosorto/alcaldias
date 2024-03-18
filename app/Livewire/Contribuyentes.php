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
use App\Models\Profesion_oficio;

class Contribuyentes extends Component
{
    use WithPagination;

    public $primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$identidad,$tipo_documento_id,$sexo,
    $impuesto_personal,$direccion,$profecion_id,$telefono,$barrio_id,$fecha_nacimiento,$apartado_postal,$email;

    public $search;
    public $createModal = false;

    public $tipo_documentos;

    public $SelectPais = NULL;
    public $departamentos;
    public $paises;
    public $barrios;
    public $pais_id;
    public $profeciones;



    public function mount(){
        $this->tipo_documentos = Tipo_documento::all();
        $this->paises = paise::all();
        $this->departamentos = [];
        $this->barrios = barrio::all();
        $this->profeciones = Profesion_oficio::all();
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

    public function store()
    {
        $contribuyente = new Contribuyente();
        $contribuyente->identidad = $this->identidad;
        $contribuyente->primer_nombre = $this->primer_nombre;
        $contribuyente->segundo_nombre = $this->segundo_nombre;
        $contribuyente->primer_apellido = $this->primer_apellido;
        $contribuyente->segundo_apellido = $this->segundo_apellido;
        $contribuyente->sexo = $this->sexo;
        $contribuyente->impuesto_personal = $this->impuesto_personal;
        $contribuyente->direccion = $this->direccion;
        $contribuyente->apartado_postal = $this->apartado_postal;
        $contribuyente->telefono = $this->telefono;
        $contribuyente->fecha_nacimiento = $this->fecha_nacimiento;
        $contribuyente->email = $this->email;
        $contribuyente->tipo_documento_id = $this->tipo_documento_id;
        $contribuyente->barrio_id = $this->barrio_id;
        $contribuyente->profecion_id = $this->profecion_id;
    
        $contribuyente->save();
    
        session()->flash('message', 'Registro creado exitosamente');
        $this->resetInputFields();
        $this->createModal = false;
    }
}
