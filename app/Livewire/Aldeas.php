<?php

namespace App\Livewire;

use App\Models\Aldea;
use Livewire\Component;
use Livewire\WithPagination;

use function Psy\debug;

class Aldeas extends Component
{
    use WithPagination;
    public bool $deleteAldeaModal = false;
    public $codigo, $nombre, $direccion, $latitud, $longitud, $id_municipio, $aldea_id, $search;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
    public $aldea;
    public $confirmingItemDeletion = false;
    
    public function confirmItemDeletion( $id) 
    {
        $this->confirmingItemDeletion = $id;
    }

    public function render()
    {
        $aldeas  = Aldea::where('nombre', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.aldeas.aldeas', ['aldeas' => $aldeas]);
    }

    private function resetInputFields(){
        $this->codigo = '';
        $this->nombre = '';
        $this->direccion = '';
        $this->latitud = '';
        $this->longitud = '';
        $this->id_municipio = '';
    }
   
    public function store()
    {
        $validatedDate = $this->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'id_municipio' => 'required',
        ]);
  
        Aldea::create($validatedDate);
  
        session()->flash('message', 'Se ha creado exitosamente');
  
        $this->resetInputFields();
        $this->dispatch('close-modal');
    }

    public function edit($id)
    {
        $persona = Aldea::findOrFail($id);
        $this->aldea_id = $id;
        $this->codigo = $aldea->codigo;
        $this->nombre = $aldea->nombre;
        $this->direccion = $aldea->direccion;
        $this->latitud = $aldea->latitud;
        $this->longitud = $aldea->longitud;
        $this->id_municipio = $aldea->id_municipio;
        $this->dispatch("open-edit");
    }

    public function closeModal()
    {
        $this->resetInputFields();
    }

    public function cancel()
    {
        $this->updateModal = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'id_municipio' => 'required',
        ]);
  
        $aldeas = Aldea::find($this->aldea_id);
        $aldeas->update([
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
            'id_municipio' => $this->id_municipio,
        ]);
  
        $this->updateModal = false;
  
        session()->flash('message', 'Registro actualizado exitosamente');
        $this->resetInputFields();
    }

    public function remove($a)
    {
        $this->deleteModal = true;
        $this->aldea = $a;
        $this->dispatch(('delete-modal'));
        
    }

    public function delete($id)
    {
        Aldea::find($id)->delete();
        session()->flash('message', 'Registro eliminado.!');
    }
}
