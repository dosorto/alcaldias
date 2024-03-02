<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Departamento;
use Livewire\WithPagination;
use App\Models\Paise;

class Departamentos extends Component
{

    use WithPagination;
    public bool $deleteDepartamentoModal = false;
    public $codigo, $name, $pais_id, $departamento_id, $search;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
    public $departamento;
    public $confirmingItemDeletion;

    public function confirmItemDeletion($id) 
    {
        $this->deleteModal = true;
        $this->confirmingItemDeletion = $id;
        
    }

    public function render()
    {
        $paises = Paise::all();
        $departamentos  = Departamento::where('name', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->with('paises')->paginate(5);
        return view('livewire.departamento.departamentos', ['departamentos' => $departamentos, 'paises' => $paises]);
    }

    private function resetInputFields(){
        $this->codigo = '';
        $this->name = '';
        $this->pais_id = '';
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
            'pais_id' => 'required'
        ]);
  
        Departamento::create($validatedData);
  
        session()->flash('message', 'Department Created Successfully.');
  
        $this->resetInputFields();
        $this->closeModal();
        $this->dispatch('close-modal');
    }

    public function edit($id)
    {
        $this->updateModal = true;
        $departamento = Departamento::findOrFail($id);
        $this->departamento_id = $id;
        $this->codigo = $departamento->codigo;
        $this->name = $departamento->name;
        $this->pais_id = $departamento->pais_id;
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
            'pais_id' => 'required'
        ]);
  
        $departamento = Departamento::find($this->departamento_id);
        $departamento->update([
            'codigo' => $this->codigo,
            'name' => $this->name,
            'pais_id' => $this->pais_id,
        ]);
  
        $this->updateModal = false;
  
        session()->flash('message', 'Department Updated Successfully.');
        $this->resetInputFields();
    }

    public function remove($id)
    {
        $this->deleteModal = true;
        $this->confirmingItemDeletion = $id;
        
    }

    public function delete()
    {
        $depto = Departamento::find($this->confirmingItemDeletion);
        $depto->delete();
        session()->flash('message', 'Registro eliminado exitosamente.');
        $this->deleteModal = false;

    }
}