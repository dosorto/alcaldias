<?php

namespace App\Livewire;

use App\Models\Propiedad as PropiedadModel;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contribuyente; 
use App\Models\Barrio; 
use App\Models\Departamento;
use App\Models\Georeferenciacion; 
use App\Models\TipoPropiedad; 
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PropiedadesExport;

class Propiedad extends Component
{
    use WithPagination;

    // Variables para los campos de la tabla
    public $propietario_id;
    public $Nombre;
    public $IdBarrio;
    public $IdContribuyente;
    public $IdTipoPropiedad;
    public $IdGeoreferencia;
    public $NombrePropietario;
    public $ClaveCatastral;
    public $name;

    // Variables para los modales
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;

    // Variable para la búsqueda
    public $search = '';

    // Variables para la confirmación de eliminación
    public $confirmingItemDeletion;

    // Variables para la actualización
    public $propiedad_id;

    // Función para renderizar la vista con paginación y búsqueda
    public function render()
    {
        $Contribuyente=Contribuyente::all();
        $Barrio=Barrio::all();
        $Georeferenciacion=Georeferenciacion::all();
        $TipoPropiedad=TipoPropiedad::all();
        $propiedad= PropiedadModel::whereHas('contribuyente', function ($query) {
            $query->where('identidad', 'like', '%' . $this->search . '%');
        })->paginate(10);

        return view('livewire.Propiedad.Propiedad', ['propiedades' => $propiedad, 'Contribuyentes'=> $Contribuyente, 'Barrios' =>$Barrio, 'Georeferenciacions' => $Georeferenciacion , 'TipoPropiedades' => $TipoPropiedad]);
    }

    // Funciones para manejar la eliminación de registros
    public function remove($id)
    {
        $this->deleteModal = true;
        $this->confirmingItemDeletion = $id;
    }

    public function closeModalDelete()
    {
        $this->deleteModal = false;
    }

    public function openModalDelete($id)
    {
        $this->deleteModal = true;
        $this->confirmingItemDeletion = $id;
    }

    public function delete()
    {
        $propiedad = PropiedadModel::find($this->confirmingItemDeletion);
        $propiedad->delete();
        session()->flash('message', 'Propiedad eliminada exitosamente.');
        $this->deleteModal = false;
    }

    // Funciones para manejar la creación de registros
    public function store()
    {
        $validatedData = $this->validate([
          
            'ClaveCatastral' => 'required',
            'IdContribuyente' => 'required',
            'IdTipoPropiedad' => 'required',
            'IdGeoreferencia' => 'required',
            'IdBarrio' => 'required',
        ]);
        //dd($validatedData);
        PropiedadModel::create($validatedData);

        session()->flash('message', 'Propiedad creada exitosamente.');

        $this->resetInputFields();
        $this->dispatch('close-modal');
       
        $this->closeModal();
    }

    // Función para reiniciar los campos del formulario
    private function resetInputFields()
    {
        $this->nombre = '';
        $this->ClaveCatastral = '';
        $this->barrio_id = '';
        $this->contribuyente_id = '';
        $this->tipo_propiedad_id = '';
        $this->georeferenciacion_id = '';
    }

    // Funciones para abrir y cerrar los modales de creación y actualización
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

    // Funciones para manejar la actualización de registros
    public function edit($id)
    {
        $this->updateModal = true;
        $propiedad = PropiedadModel::findOrFail($id);
        $this->propiedad_id = $propiedad->id;
        $this->ClaveCatastral = $propiedad->ClaveCatastral;
        $this->Nombre = $propiedad->IdContribuyente;
        $this->barrio_id = $propiedad->barrio_id;
        $this->contribuyente_id = $propiedad->contribuyente_id;
        $this->tipo_propiedad_id = $propiedad->tipo_propiedad_id;
        $this->georeferenciacion_id = $propiedad->georeferenciacion_id;
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
           
            'ClaveCatastral' => 'required',
            'IdContribuyente' => 'required',
            'IdTipoPropiedad' => 'required',
            'IdGeoreferencia' => 'required',
            'IdBarrio' => 'required',
        ]);

        $propiedad = PropiedadModel::find($this->propiedad_id);
        $propiedad->update([
            'ClaveCatastral' => $this->ClaveCatastral,
            'IdContribuyente' => $this->IdContribuyente,
            'IdTipoPropiedad' => $this->IdTipoPropiedad,
            'IdGeoreferencia' => $this->IdGeoreferencia,
            'IdBarrio' => $this->IdBarrio,
        ]);

        $this->updateModal = false;

        session()->flash('message', 'Propiedad actualizada exitosamente.');
        $this->resetInputFields();
    }

    public function export(){
        return Excel::download(new PropiedadesExport,'Propiedades.xlsx');

    }
}