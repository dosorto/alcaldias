<?php

namespace App\Livewire\alan;

use App\Models\Alan;
use Livewire\Component;

class Persona extends Component
{
    public $personas, $nombres, $apellidos, $dni, $fecha_nacimiento, $id_persona;
    public $modalCrear = false;
    public $modalEditar = false;


    public function render()
    {
        $this->personas = Alan::all();
        return view('livewire.alan.persona');
    }

    public function crear()
    {
        $this->limpiar();
        $this->irCrear();
    }



    public function irCrear() {
        $this->modalCrear = true;
    }

    public function irEditar($id) {
        $this->modalEditar = true;
        $persona = Alan::findOrFail($id);
        $this->id_persona = $id;
        $this->nombres = $persona->nombres;
        $this->apellidos = $persona->apellidos;
        $this->dni = $persona->dni;
        $this->fecha_nacimiento = $persona->fecha_nacimiento;
    }

    public function eliminar($id)
    {
        Alan::find($id)->delete();
    }
    public function volver()
    {
        $this->irPersonas();
    }


    public function irPersonas() {
        $this->modalCrear = false;
        $this->modalEditar = false;
    }

    public function guardar() {
        $this->modalCrear = false;
        $this->modalEditar = false;
        Alan::updateOrCreate(['id'=>$this->id_persona],
        [
        'nombres' => $this->nombres,
        'apellidos' => $this->apellidos,
        'dni' => $this->dni,
        'fecha_nacimiento' => $this->fecha_nacimiento
        ]);
    }


    public function limpiar() {
        $this->nombres = '';
        $this->apellidos = '';
        $this->dni = '';
        $this->fecha_nacimiento = '';
        $this->id_persona = '';

    }

    public function retornar()
    {
        return view('livewire.alan.persona');

    }


}
