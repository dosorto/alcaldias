<?php

namespace App\Livewire;

use App\Models\TipoPropiedad as TipodePropiedad;
use Livewire\Component;
use Livewire\WithPagination;

class TipoPropiedad extends Component
{
    use WithPagination;


    // variables para los campos de la tabla
    public $Nombre;

    // variables para los modales
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;



    // variable para la busqueda
    public $search = '';

    // variables para la confirmacion de eliminacion
    public $confirmingItemDeletion;


    // variables para la actualizacion
    public $tipo_propiedad_id;

    public function render()
    {
        $documento = TipodePropiedad::where('Nombre', 'like', '%'.$this->search.'%')
            ->paginate(10);

        return view('livewire.TipoPropiedad.TipoPropiedad', ['documentos' => $documento]);
    }


    // funciones para eliminar registros
    // recibe como parametro el id del registro a eliminar
    public function remove($id)
    {
        $this->deleteModal = true;
        // se asigna el id del registro a la variable confirmingItemDeletion
        $this->confirmingItemDeletion = $id;

    }
    public function closeModalDelete()
    {
        $this->deleteModal = false;
    }
    public function delete()
    {
        $documento = TipodePropiedad::find($this->confirmingItemDeletion);
        $documento->delete();
        session()->flash('message', 'Registro eliminado exitosamente.');
        $this->deleteModal = false;
    }


    // funciones para crear registros
    public function store()
    {
        $validatedData = $this->validate([
            'Nombre' => 'required',
        ]);

        TipodePropiedad::create($validatedData);

        session()->flash('message', 'Propiedad creada exitosamente.');

        $this->resetInputFields();
        $this->closeModal();
        $this->dispatch('close-modal');
    }

    // funciones para crear registros
    private function resetInputFields(){
        $this->Nombre = '';
    }

    public function openModalCreate()
    {
        $this->createModal = true;
    }


    public function closeModal()
    {
        $this->deleteModal = false;
        $this->createModal = false;
        $this->updateModal = false;
        $this->resetInputFields();
    }


    // funciones para actualizar registros

    public function edit($id)
    {
        $this->updateModal = true;
        $documento = TipodePropiedad::findOrFail($id);
        $this->tipo_propiedad_id = $documento->id;
        $this->Nombre = $documento->Nombre;
        $this->dispatch("open-edit");
    }
    public function cancel()
    {
        $this->updateModal = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'Nombre' => 'required',
        ]);

        $documento = TipodePropiedad::find($this->tipo_propiedad_id);
        $documento->update($validatedData);

        $this->updateModal = false;

        session()->flash('message', 'Propiedad actualizada exitosamente.');
        $this->resetInputFields();
    }
}

