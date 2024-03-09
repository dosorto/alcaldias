<?php

namespace App\Livewire\ProfesionOficio;

use Livewire\Component;
use App\Models\Profesion_oficio;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;

class ProfesionOficio extends Component
{
    use WithPagination, WithoutUrlPagination;
    public bool $deleteprofesionModal = false;
    public $nombre, $profesion_id, $search;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
    public $profesion;
    public $confirmingItemDeletion;

    public function render()
    {
        $profesion  = Profesion_oficio::where('nombre', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5);
        return view('livewire.profesion-oficio.profesion-oficio', ['profesiones' => $profesion]);
    }

    private function resetInputFields(){
        $this->nombre = '';
    }

    public function openModalCreate()
    {
        $this->createModal = true;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'nombre' => 'required'
        ]);

        Profesion_oficio::create($validatedData);

        session()->flash('message', 'Profesión Created Successfully.');

        $this->resetInputFields();
        $this->closeModal();
        $this->dispatch('close-modal');
    }

    public function edit($id)
    {
        $this->updateModal = true;
        $profesion = Profesion_oficio::findOrFail($id);
        $this->profesion_id = $id;
        $this->nombre = $profesion->nombre;
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
            'nombre' => 'required',
        ]);

        $profesion = Profesion_oficio::find($this->profesion_id);
        $profesion->update([
            'nombre' => $this->nombre
        ]);

        $this->updateModal = false;

        session()->flash('message', 'Profesión Updated Successfully.');
        $this->resetInputFields();
    }

    public function remove($id)
    {
        $this->deleteModal = true;
        $this->confirmingItemDeletion = $id;

    }

    public function delete()
    {
        $profesion = Profesion_oficio::find($this->confirmingItemDeletion);
        $profesion->delete();
        session()->flash('message', 'Registro eliminado exitosamente.');
        $this->deleteModal = false;

    }
}
