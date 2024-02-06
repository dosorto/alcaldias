<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\AlexCrud;

class AlexComponente extends Component

{
    public $nombres, $dni,  $sexo, $fecha_nacimiento, $id_persona;
    public $modalCrear = false;
    public $modalEditar = false;

    public function render()
    {
        $personas = AlexCrud::all();
        return view('livewire.alex.alex-componente', compact('personas'));
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
        $persona = AlexCrud::findOrFail($id);
        $this->id_persona = $id;
        $this->nombres = $persona->nombres;
        $this->sexo = $persona->sexo;
        $this->dni = $persona->dni;
        $this->fecha_nacimiento = $persona->fecha_nacimiento;
    }

    public function eliminar($id) 
    {
        AlexCrud::find($id)->delete();
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
        if($this->nombres and $this->sexo and  $this->dni and $this->fecha_nacimiento){
            $this->modalCrear = false;
            $this->modalEditar = false;
            AlexCrud::updateOrCreate(['id'=>$this->id_persona],
            [
            'nombres' => $this->nombres,
            'dni' => $this->dni,
            'sexo' => $this->sexo,
            'fecha_nacimiento' => $this->fecha_nacimiento
            ]);
        }   
        $this->render();     
    }


    public function limpiar() {
        $this->nombres = '';
        $this->sexo = '';
        $this->dni = '';
        $this->fecha_nacimiento = '';
        $this->id_persona = '';

    }

    public function retornar()
    {
        return view('livewire.alex.alex-componente');
        
    }

}
