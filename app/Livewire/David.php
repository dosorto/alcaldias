<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Isaac;

class David extends Component
{
    public $personas,  $nombre, $apellido, $id_persona;
    public $modal =false;
    public function render()
    {
        $this->personas =Isaac::all();
        return view('livewire.personas')->layout('layouts.app');
    }


    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }

    public function abrirModal() {
        $this->modal = true;
    }
    public function cerrarModal() {
        $this->modal = false;
    }
    public function limpiarCampos(){
        $this->id_persona = '';
        $this->nombre = '';
        $this->apellido = '';
    }
    public function editar($id)
    {
        $persona = Isaac::findOrFail($id);
        $this->id_persona = $id;
        $this->nombre = $persona->nombre;
        $this->apellido = $persona->apellido;
        $this->abrirModal();
    }

    public function borrar($id)
    {
        Isaac::find($id)->delete();
        session()->flash('message', 'Registro eliminado correctamente');
    }

    public function guardar()
    {
        Isaac::updateOrCreate(['id'=>$this->id_persona],
            [
                'nombre' => $this->nombre,
                'apellido' => $this->apellido
            ]);
         
         session()->flash('message',
            $this->id_persona ? '¡Actualización exitosa!' : '¡Agregado Exitosamente!');
         
         $this->cerrarModal();
         $this->limpiarCampos();
    }
}
