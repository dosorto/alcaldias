<?php

namespace App\Livewire;

use App\Models\Nivel;
use Livewire\Component;
use Livewire\WithPagination;

class Niveles extends Component
{
    use WithPagination;
    public bool $deletenivelModal = false;
    public $nombre, $fechacts, $clave, $status, $nivel_id, $search;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
    public $nivel;
    public $confirmingItemDeletion;
    
    public function confirmItemDeletion( $id) 
    {
        $this->confirmingItemDeletion = $id;
    }

    public function render()
    {
        $niveles  = Nivel::where('nombre', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.niveles.niveles', ['niveles' => $niveles]);
    }

    private function resetInputFields(){
        $this->clave = '';
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
            'clave' => 'required',
            'nombre' => 'required',
            'fechacts' => 'required',
            'status' => 'required',
        ]);
  
        Nivel::create($validatedDate);
  
        session()->flash('message', 'Se ha creado exitosamente');
  
        $this->resetInputFields();
        $this->closeModal();
        $this->dispatch('close-modal');
    }

    public function edit($id)
    {
        $this->updateModal = true;
        $nivel = Nivel::findOrFail($id);
        $this->nivel_id = $id;
        $this->clave = $nivel->clave;
        $this->nombre = $nivel->nombre;
        $this->fechacts = $nivel->fechacts;
        $this->status = $nivel->status;
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
            'clave' => 'required',
            'nombre' => 'required',
            'fechacts' => 'required',
            'status' => 'required',
        ]);
  
        $nivel = Nivel::find($this->nivel_id);
        $nivel->update([
            'clave' => $this->clave,
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
        $nivel = Nivel::find($this->confirmingItemDeletion);
        $nivel->delete();
        session()->flash('message', 'Registro eliminado exitosamente.');
        $this->deleteModal = false;
    }
}
