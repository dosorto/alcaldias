<?php

namespace App\Livewire;

use App\Models\Nivel;
use Livewire\Component;
use App\Models\Servicio;
use App\Models\Tipo;
use Livewire\WithPagination;
use function Psy\debug;
use App\Exports\ServiciosExport;
use Maatwebsite\Excel\Facades\Excel;

class Servicios extends Component
{
    use WithPagination;
    public bool $deletePaisModal = false;
    public $id_servicio,$nombre_servicio, $tipo_servicio_id,$nivel_servicio_id,$clave_presupuestaria,$importes,$fecha_creacion,$status, $search;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
    public $servicios;
    public $tipo;
    public $confirmingItemDeletion = false;

    public function confirmItemDeletion( $id)
    {
        $this->confirmingItemDeletion = $id;
    }


    public function render()
    {
        $tipos=Tipo::all();
        $nivels=Nivel::all();
        $servi = Servicio::where('nombre_servicio', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->with('tipos', 'nivels')->paginate(5);
        return view('livewire.servicio.servicios', ['servicio' => $servi,'tipos'=>$tipos, 'nivels'=>$nivels]);
    }

    private function resetInputFields(){
        $this->nombre_servicio = '';
        $this-> tipo_servicio_id= '';
        $this->nivel_servicio_id= '';
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
        session()->flash('message', 'Resgistro creado exitosamente.');
        $this->createModal=false;

        // Resto del código
    }

    public function edit($id)
    {   $this->updateModal=true;
        $servicio = Servicio::findOrFail($id);
        $this->id_servicio = $id;
        $this->nombre_servicio = $servicio->nombre_servicio;
        $this->tipo_servicio_id = $servicio->tipo_servicio_id;
        $this->nivel_servicio_id=$servicio->nivel_servicio_id;
        $this->clave_presupuestaria = $servicio->clave_presupuestaria;
        $this->importes = $servicio->importes;
        $this->fecha_creacion = $servicio->fecha_creacion;
        $this->status = $servicio->status;
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

        $servicios = Servicio::find($this->id_servicio);
        $servicios->update([
            'nombre_servicio' => $this->nombre_servicio,
            'tipo_servicio_id' => $this->tipo_servicio_id,
            'nivel_servicio_id' => $this->nivel_servicio_id,
            'clave_presupuestaria' => $this->clave_presupuestaria,
            'importes' => $this->importes,
            'fecha_creacion' => $this->fecha_creacion,
            'status' => $this->status,
        ]);

        $this->updateModal = false;

        session()->flash('message', 'Resgistro actualizado exitosamente.');
        $this->resetInputFields();
    }

    public function remove($id)
    {
        $this->deleteModal = true;
        $this->confirmingItemDeletion = $id;

    }

    public function delete()
    {
        $servicios = Servicio::find($this->confirmingItemDeletion);
        $servicios->delete();
        session()->flash('message', 'Registro eliminado exitosamente.');
        $this->deleteModal = false;
    }

    public function nuevoModal()
    {
        $this->createModal=true;
    }

    public function export(){
        return Excel::download(new ServiciosExport,'Servicios.xlsx');

    }
}


