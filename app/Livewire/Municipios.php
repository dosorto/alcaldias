<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Departamento;
use Livewire\WithPagination;
use App\Models\Municipio;

class Municipios extends Component
{

    use WithPagination;
    public bool $deleteDepartamentoModal = false;
    public $codigo, $name, $municipio_id, $departamento_id, $search;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
    public $municipio;
    public $confirmingItemDeletion;

    public function confirmItemDeletion($id) 
    {
        $this->deleteModal = true;
        $this->confirmingItemDeletion = $id;
        
    }

    public function render()
    {
        $departamentos = Departamento::all();
        $municipios  = Municipio::where('name', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->with('departamentos')->paginate(5);
        return view('livewire.municipio.municipios', ['municipios' => $municipios, 'departamentos' => $departamentos]);
    }



    private function resetInputFields(){
        $this->codigo = '';
        $this->name = '';
        $this->departamento_id = '';
    }

    public function openModalCreate()
    {
        $this->createModal = true;
    }


    public function store()
    {
        $validatedData = $this->validate([
            'codigo' => 'required',
            'name' => 'required',
            'departamento_id' => 'required',
        ]);
  
        Municipio::create($validatedData);
  
        session()->flash('message', 'Municipio Created Successfully.');
  
        $this->resetInputFields();
        $this->closeModal();
        $this->dispatch('close-modal');
    }

    public function edit($id)
    {
        $this->updateModal = true;
        $municipio = Municipio::findOrFail($id);
        $this->municipio_id = $id;
        $this->codigo = $municipio->codigo;
        $this->name = $municipio->name;
        $this->departamento_id = $municipio->departamento_id;
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
        $validatedData = $this->validate([
            'codigo' => 'required',
            'name' => 'required',
            'departamento_id' => 'required'
        ]);
  
        $municipio = Municipio::find($this->municipio_id);
        $municipio->update([
            'codigo' => $this->codigo,
            'name' => $this->name,
            'departamento_id' => $this->departamento_id,
        ]);
  
        $this->updateModal = false;
  
        session()->flash('message', 'Municipio Updated Successfully.');
        $this->resetInputFields();
    }

    public function remove($id)
    {
        $this->deleteModal = true;
        $this->confirmingItemDeletion = $id;
    }

    public function delete()
    {
        $municipio = Municipio::find($this->confirmingItemDeletion);
        $municipio->delete();
        session()->flash('message', 'Registro eliminado exitosamente.');
        $this->deleteModal = false;
    }
}