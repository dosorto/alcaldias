<?php

namespace App\Livewire;

use App\Models\Barrio;
use App\Models\Aldea;
use App\Models\Municipio;
use App\Models\Departamento;
use App\Models\Paise;
use Livewire\Component;
use Livewire\WithPagination;


class Barrios extends Component
{
    use WithPagination;
    public bool $deleteAldeaModal = false;
    public  $nombre, $direccion, $latitud, $longitud,  $barrio_id, $search;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
   
    public $municipio_id;
    public $departamento_id;
    public $confirmingItemDeletion;
    public $pais_id;

    public $departamentos = [];

    public $municipios = [];

    public $aldeas = [];
    public $aldea_id;

    public $aldeaID;
    
    public function confirmItemDeletion( $id) 
    {
        $this->confirmingItemDeletion = $id;
    }

    public function render()
    {
        $valorSeleccionado = $this->pais_id;
        $pais=Paise::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        $aldeas = Aldea::all();
        $barrios  = Barrio::where('nombre', 'like', '%'.$this->search.'%')->paginate(10);
        
        return view('livewire.barrios.barrios', ['pais'=>$pais, 'municipios' => $municipios, 'departamentos' => $departamentos, 'aldeas' => $aldeas, 'barrios'=>$barrios]);
    }

    private function resetInputFields(){
       
        $this->nombre = '';
        $this->direccion = '';
        $this->latitud = '';
        $this->longitud = '';
        $this->aldea_id = '';
    }

    public function openModalCreateBarrios()
    {
        $this->createModal = true;
    }
   
    public function store()
    {
        $validatedDate = $this->validate([
            
            'nombre' => 'required',
            'direccion' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'aldea_id' => 'required',
        ]);
  
        Barrio::create($validatedDate);
  
        session()->flash('message', 'Se ha creado exitosamente');
  
        $this->resetInputFields();
        $this->closeModal();
         $this->dispatch('close-modal');
    }

    public function editBarrio($id)
{
    $this->updateModal = true;
    $barrio = Barrio::findOrFail($id);
    $this->barrio_id = $id;
    $this->nombre = $barrio->nombre;
    $this->direccion = $barrio->direccion;
    $this->latitud = $barrio->latitud;
    $this->longitud = $barrio->longitud;
    $this->aldea_id = $barrio->aldea_id;
    $this->dispatch("open-edit");
}

    public function updateDepartamentos()
{
    if (!empty($this->pais_id)) {
        $this->departamentos = Departamento::where('pais_id', $this->pais_id)->get();
    } else {
        $this->departamentos = [];
    }
}

public function updateMunicipios()
{
    if (!empty($this->departamento_id)) {
        $this->municipios = Municipio::where('departamento_id', $this->departamento_id)->get();
    } else {
        $this->municipios = [];
    }
}

public function updateAldeas()
{
    if (!empty($this->municipio_id)) {
        $this->aldeas = Aldea::where('municipio_id', $this->municipio_id)->get();
    } else {
        $this->aldeas = [];
    }
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
            'direccion' => 'required',
            'latitud' => 'required',
            'longitud' => 'required',
            'aldea_id' => 'required',
        ]);
  
        $barrios = Barrio::find($this->barrio_id);
        $barrios->update([
            
            'nombre' => $this->nombre,
            'direccion' => $this->direccion,
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
            'municipio_id' => $this->aldea_id,
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
        $barrio = Barrio::find($this->confirmingItemDeletion);
        $barrio->delete();
        session()->flash('message', 'Registro eliminado exitosamente.');
        $this->deleteModal = false;
    }
}
