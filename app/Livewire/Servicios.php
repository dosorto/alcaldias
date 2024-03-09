<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Servicio;

use Livewire\WithPagination;
use function Psy\debug;

class Servicios extends Component
{
    use WithPagination;
    public bool $deletePaisModal = false;
    public $id_servicio,$nombre_servicio, $tipo_servicio_id,$nivel_servivio_id,$clave_presupuestaria,$importes,$fecha_creacion,$status, $search;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
    public $servicios;
    public $confirmingItemDeletion = false;

    public function confirmItemDeletion( $id)
    {
        $this->confirmingItemDeletion = $id;
    }


    public function render()
    {
        $servicios  = Servicio::where('nombre', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5);
        return view('livewire.servicio.servicio', ['servicios' => $servicios]);
    }

    private function resetInputFields(){
        $this->nombre_servicio = '';
        $this-> tipo_servicio_id= '';
        $this->nivel_servivio_id= '';
        $this->clave_presupuestaria= '';
        $this->importes= '';
        $this->fecha_creacion= '';
        $this->status= '';

    }

    public function store()
    {
        $validatedData = $this->validate([
        'nombre_servicio' => 'required',
        'tipo_servicio_id' => 'required',
        'nivel_servicio_id' => 'required',
        'clave_presupuestaria' => 'required',
        'importes' => 'required',
        'fecha_creacion' => 'required',
        'status' => 'required',
        ]);

        // Agregar el campo 'created_by' antes de crear el registro
        $validatedData['created_by'] = auth()->id(); // Suponiendo que estás utilizando la autenticación de Laravel

        // Crear el registro en la base de datos
        Servicio::create($validatedData);
        $this->createModal=false;

        // Resto del código
    }

    public function edit($id)
    {   $this->updateModal=true;
        $servicios = Servicio::findOrFail($id);
        $this->id_servicio = $id;
        $this->nombre_servicio = $servicios->nombre_servicio;
        $this->tipo_servicio_id = $servicios->tipo_servicio_id;
        $this->nivel_servivio_id=$servicios->nivel_servicio_id;
        $this->clave_presupuestaria = $servicios->clave_presupuestaria;
        $this->importes = $servicios->importes;
        $this->fecha_creacion = $servicios->fecha_creacion;
        $this->status = $servicios->status;
        $this->dispatch("open-edit");
    }

    public function closeModal()
    {
        $this->deleteModal = false;
        $this->createModal = false;
        $this->updateModal = false;
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
            'nombre_servicio' => 'required',
            'tipo_servicio_id' => 'required',
            'nivel_servicio_id' => 'required',
            'clave_presupuestaria' => 'required',
            'importes' => 'required',
            'fecha_creacion' => 'required',
            'status' => 'required',
        ]);

        $paises = Servicio::find($this->id_pais);
        $paises->update([
            'nombre_servicio' => $this->nombre_servicio,
            'tipo_servicio_id' => $this->tipo_servicio_id,
            'nivel_servicio_id' => $this->nivel_servivio_id,
            'clave_presupuestaria' => $this->clave_presupuestaria,
            'importes' => $this->importes,
            'fecha_creacion' => $this->fecha_creacion,
            'status' => $this->status,
        ]);

        $this->updateModal = false;

        session()->flash('message', 'Pais Updated Successfully.');
        $this->resetInputFields();
    }

    public function remove($id)
    {
        $this->deleteModal = true;
        $this->confirmingItemDeletion = $id;

    }

    public function delete()
    {
        $paises = Servicio::find($this->confirmingItemDeletion);
        $paises->delete();
        session()->flash('message', 'Registro eliminado exitosamente.');
        $this->deleteModal = false;
    }

    public function nuevoModal()
    {
        $this->createModal=true;
    }
}


