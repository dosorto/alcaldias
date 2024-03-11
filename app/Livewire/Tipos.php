<?php

namespace App\Livewire;

use App\Models\Tipo;
use Livewire\Component;
use Livewire\WithPagination;

class Tipos extends Component
{
    use WithPagination;
    public bool $deletetipoModal = false;
    public $nombre, $fechacts, $status, $tipo_id, $search;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
    public $tipo;
    public $confirmingItemDeletion;
    
    public function confirmItemDeletion( $id) 
    {
        $this->confirmingItemDeletion = $id;
    }

    public function render()
    {
        $tipos  = Tipo::where('nombre', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.tipos.tipos', ['tipos' => $tipos]);
    }

    private function resetInputFields(){
        $this->nombre = '';
        $this->fechacts = '';
        $this->status = '';
    }

    public function openModalCreate()
    {
        $this->createModal = true;
    }
   
    public function store()
    {
        $validatedDate = $this->validate([
            'nombre' => 'required',
            'fechacts' => 'required',
            'status' => 'required',
        ]);
  
        Tipo::create($validatedDate);
  
        session()->flash('message', 'Se ha creado exitosamente');
  
        $this->resetInputFields();
        $this->closeModal();
        $this->dispatch('close-modal');
    }

    public function edit($id)
    {
        $this->updateModal = true;
        $tipo = Tipo::findOrFail($id);
        $this->tipo_id = $id;
        $this->nombre = $tipo->nombre;
        $this->fechacts = $tipo->fechacts;
        $this->status = $tipo->status;
        $this->dispatch("open-edit");
    }

    public function closeModal()
    {
        $this->deleteModal = false;
        $this->createModal = false;
        $this->updateModal = false;
        $this->resetInputFields();
    }

    public function closeModalDelete()
    {
        $this->deleteModal = false;
    }

    public function cancel()
    {
        $this->updateModal = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'nombre' => 'required',
            'fechacts' => 'required',
            'status' => 'required',
        ]);
  
        $tipo = Tipo::find($this->tipo_id);
        $tipo->update([
            'nombre' => $this->nombre,
            'fechacts' => $this->fechacts,
            'status' => $this->status,
        ]);
  
        $this->updateModal = false;
  
        session()->flash('message', 'Registro actualizado exitosamente');
        $this->resetInputFields();
    }

    public function remove($id)
    {
        $this->deleteModal = true;
        $this->confirmingItemDeletion = $id;
    }

    public function delete()
    {
        $tipo = Tipo::find($this->confirmingItemDeletion);
        $tipo->delete();
        session()->flash('message', 'Registro eliminado exitosamente.');
        $this->deleteModal = false;
    }
}
