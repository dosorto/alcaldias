<?php

namespace App\Livewire;

use App\Models\Aldea;
use App\Models\Municipio;
use App\Models\Departamento;
use Livewire\Component;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AldeasExport;

class Aldeas extends Component
{
    use WithPagination;
    public bool $deleteAldeaModal = false;
    public $codigo, $nombre, $direccion, $latitud, $longitud, $municipio_id, $aldea_id, $search;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
    public $aldea;
    public $departamento_id;
    public $confirmingItemDeletion;
    
    public function confirmItemDeletion( $id) 
    {
        $this->confirmingItemDeletion = $id;
    }

    public function render()
    {
        $valorSeleccionado = $this->departamento_id;
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $aldeas  = Aldea::where('nombre', 'like', '%'.$this->search.'%')->paginate(10);
        return view('livewire.aldeas.aldeas', ['municipios' => $municipios, 'departamentos' => $departamentos, 'aldeas' => $aldeas]);
    }

    private function resetInputFields(){
        $this->codigo = '';
        $this->nombre = '';
        $this->direccion = '';
        $this->latitud = '';
        $this->longitud = '';
        $this->municipio_id = '';
    }

    public function openModalCreate()
    {
        $this->createModal = true;
    }
   
    public function store()
    {
        $validatedDate = $this->validate([
            'codigo' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'latitud' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'longitud' => ['required', 'regex:/^[-]?((([0-9]?[0-9])|([1]?[0-7][0-9]))\.(\d+))|(180(\.0+)?)$/'],
            'municipio_id' => 'required',
        ]);
  
        Aldea::create($validatedDate);
  
        session()->flash('message', 'Se ha creado exitosamente');
  
        $this->resetInputFields();
        $this->closeModal();
        $this->dispatch('close-modal');
    }

    public function edit($id)
    {
        $this->updateModal = true;
        $aldea = Aldea::findOrFail($id);
        $this->aldea_id = $id;
        $this->codigo = $aldea->codigo;
        $this->nombre = $aldea->nombre;
        $this->direccion = $aldea->direccion;
        $this->latitud = $aldea->latitud;
        $this->longitud = $aldea->longitud;
        $this->municipio_id = $aldea->municipio_id;
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
            'codigo' => 'required',
            'nombre' => 'required',
            'direccion' => 'required',
            'latitud' => ['required', 'regex:/^[-]?(([0-8]?[0-9])\.(\d+))|(90(\.0+)?)$/'],
            'longitud' => ['required', 'regex:/^[-]?((([0-9]?[0-9])|([1]?[0-7][0-9]))\.(\d+))|(180(\.0+)?)$/'],
            'municipio_id' => 'required',
        ]);
  
        $aldeas = Aldea::find($this->aldea_id);
        $aldeas->update([
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
            'municipio_id' => $this->municipio_id,
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
        $aldea = Aldea::find($this->confirmingItemDeletion);
        $aldea->delete();
        session()->flash('message', 'Registro eliminado exitosamente.');
        $this->deleteModal = false;
    }

    public function export(){
        return Excel::download(new AldeasExport,'Aldeas.xlsx');

    }
}
