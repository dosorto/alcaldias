<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Contribuyente;
use App\Models\Departamento;
use App\Models\Tipo_documento;
use App\Models\Municipio;
use App\Models\Paise;
use App\Models\Barrio;
use App\Models\Aldea;
use App\Models\Profesion_oficio;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ContribuyenteExport;

class Contribuyentes extends Component
{
    use WithPagination;

    public $primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$identidad,$tipo_documento_id,$sexo,
    $impuesto_personal,$direccion,$profecion_id,$telefono,$barrio_id,$fecha_nacimiento,$apartado_postal,$email;
    public $search;
    public $createModal = false;
    public $updateModal = false;
    public $deleteModal = false;
    public $viewmodal = false;
    public $tipo_documentos;
    public $SelectPais = NULL;
    public $departamentos;
    public $paises;
    public $barrios;
    public $aldeas;
    public $municipios;
    public $profeciones;
    public $id;
    public $confirmingItemDeletion;
    public $pais_id;
    public $departamento_id;
    public $municipio_id;
    public $aldea_id;



    public function mount(){
        $this->tipo_documentos = Tipo_documento::all();
        $this->paises = paise::all();
        $this->profeciones = Profesion_oficio::all();
        $this->departamentos = collect();
        $this->municipios = collect();
        $this->aldeas = collect();
        $this->barrios = collect();
    }

    public function render()
    {
        $profeciones = Profesion_oficio::all();
        $tipo_documentos = Tipo_documento::all();
        $contribuyentes = Contribuyente::where('primer_nombre','like','%'. $this->search.'%')->paginate(5);
        return view('livewire.contribuyente.contribuyente',compact('contribuyentes', 'tipo_documentos', 'profeciones'));
    }

    public function closeModalDelete()
    {
        $this->deleteModal = false;
    }

    public function remove($id)
    {
        $this->deleteModal = true;
        $this->confirmingItemDeletion = $id;
    }

    public function delete()
    {
        $contribuyente = Contribuyente::find($this->confirmingItemDeletion);
        $contribuyente ->delete();
        session()->flash('message', 'Registro eliminado exitosamente.');
        $this->deleteModal = false;
    }
    public function openModalCreate()
    {
        $this->createModal=true;
    }
    public function closeModal()
    {
        $this->createModal = false;
        $this->updateModal = false;
        $this->deleteModal = false;
        $this->viewmodal = false;
        $this->resetInputFields();
    }

    public function store()
    {
        $contribuyente = new Contribuyente();
        $contribuyente->identidad = $this->identidad;
        $contribuyente->primer_nombre = $this->primer_nombre;
        $contribuyente->segundo_nombre = $this->segundo_nombre;
        $contribuyente->primer_apellido = $this->primer_apellido;
        $contribuyente->segundo_apellido = $this->segundo_apellido;
        $contribuyente->sexo = $this->sexo;
        $contribuyente->impuesto_personal = $this->impuesto_personal;
        $contribuyente->direccion = $this->direccion;
        $contribuyente->apartado_postal = $this->apartado_postal;
        $contribuyente->telefono = $this->telefono;
        $contribuyente->fecha_nacimiento = $this->fecha_nacimiento;
        $contribuyente->email = $this->email;
        $contribuyente->tipo_documento_id = $this->tipo_documento_id;
        $contribuyente->barrio_id = $this->barrio_id;
        $contribuyente->profecion_id = $this->profecion_id;
        $contribuyente->created_by = auth()->id();
    
        $contribuyente->save();
        $contribuyenteId = $contribuyente->id;    
        session()->flash('message', 'Registro creado exitosamente');        
        $this->resetInputFields();
        $this->createModal = false;        
        return redirect()->to('/detallesuscripcion/' . $contribuyenteId);
    }

    private function resetInputFields(){
       
        $this->identidad = '';
        $this->primer_nombre = '';
        $this->segundo_nombre = '';
        $this->primer_apellido = '';
        $this->segundo_apellido = '';
        $this->sexo = '';
        $this->impuesto_personal = '';
        $this->direccion = '';
        $this->apartado_postal = '';
        $this->telefono = '';
        $this->fecha_nacimiento = '';
        $this->email = '';
        $this->tipo_documento_id = '';
        $this->barrio_id = '';
        $this->profecion_id = '';
    }

    public function edit($id){
    //$this->updateModal = true;
    $this->updateModal = true;
    // Obtener el barrio con su aldea asociada
    $contribuyente = Contribuyente::findOrFail($id);
    
    // Establecer los valores del barrio y su aldea asociada
        $this->id = $contribuyente->id;    
        $this->identidad = $contribuyente->identidad;
        $this->primer_nombre = $contribuyente->primer_nombre;
        $this->segundo_nombre = $contribuyente->segundo_nombre;
        $this->primer_apellido = $contribuyente->primer_apellido;
        $this->segundo_apellido = $contribuyente->segundo_apellido;
        $this->sexo = $contribuyente->sexo;
        $this->impuesto_personal = $contribuyente->impuesto_personal;
        $this->direccion = $contribuyente->direccion;
        $this->apartado_postal = $contribuyente->apartado_postal;
        $this->telefono = $contribuyente->telefono;
        $this->fecha_nacimiento = $contribuyente->fecha_nacimiento;
        $this->email = $contribuyente->email;
        $this->tipo_documento_id = $contribuyente->tipo_documento_id;
        $this->barrio_id = $contribuyente->barrio_id;
        $this->profecion_id = $contribuyente->profecion_id;
    

    }

   

    public function update(){
    $contribuyente = Contribuyente::find($this->id);
    
    $contribuyente->update([
        'identidad' => $this->identidad,
        'primer_nombre' => $this->primer_nombre,
        'segundo_nombre' => $this->segundo_nombre,
        'primer_apellido' => $this->primer_apellido,
        'segundo_apellido' => $this->segundo_apellido,
        'sexo' => $this->sexo,
        'impuesto_personal' => $this->impuesto_personal,
        'direccion' => $this->direccion,
        'apartado_postal' => $this->apartado_postal,
        'telefono' => $this->telefono,
        'fecha_nacimiento' => $this->fecha_nacimiento,
        'email' => $this->email,
        'tipo_documento_id' => $this->tipo_documento_id,
        'barrio_id' => $this->barrio_id,
        'profecion_id' => $this->profecion_id
        ]);

        $this->updateModal = false;
  
        session()->flash('message', 'Registro actualizado exitosamente');
        $this->resetInputFields();

    }

    public function view($id){
        //$this->updateModal = true;
        $this->viewmodal = true;
        // Obtener el barrio con su aldea asociada
        $contribuyente = Contribuyente::findOrFail($id);
        
        // Establecer los valores del barrio y su aldea asociada
            $this->id = $contribuyente->id;    
            $this->identidad = $contribuyente->identidad;
            $this->primer_nombre = $contribuyente->primer_nombre;
            $this->segundo_nombre = $contribuyente->segundo_nombre;
            $this->primer_apellido = $contribuyente->primer_apellido;
            $this->segundo_apellido = $contribuyente->segundo_apellido;
            $this->sexo = $contribuyente->sexo;
            $this->impuesto_personal = $contribuyente->impuesto_personal;
            $this->direccion = $contribuyente->direccion;
            $this->apartado_postal = $contribuyente->apartado_postal;
            $this->telefono = $contribuyente->telefono;
            $this->fecha_nacimiento = $contribuyente->fecha_nacimiento;
            $this->email = $contribuyente->email;
            $this->tipo_documento_id = $contribuyente->tipo_documento_id;
            $this->barrio_id = $contribuyente->barrio_id;
            $this->profecion_id = $contribuyente->profecion_id;
        
    
        }

        public function updatedPaisId($value) {
            $this->departamentos = collect();
            $this->municipios = collect();
            $this->aldeas = collect();
            $this->barrios = collect();
            $this->departamentos = Departamento::where('pais_id', $value)->get();
            $this->departamento_id = null;
        }
        
        public function updatedDepartamentoId($value) {
            $this->municipios = collect();
            $this->aldeas = collect();
            $this->barrios = collect();
            $this->municipios = Municipio::where('departamento_id', $value)->get();
            $this->municipio_id = null;
        }
        
        public function updatedMunicipioId($value) {
            $this->aldeas = collect();
            $this->barrios = collect();
            $this->aldeas = Aldea::where('municipio_id', $value)->get();
            $this->aldea_id = null;
        }
        
        public function updatedAldeaId($value) {
            $this->barrios = collect();
            $this->barrios = Barrio::where('aldea_id', $value)->get();
            $this->barrio_id = null;
        }

        public function export(){
            return Excel::download(new ContribuyenteExport,'Contribuyentes.xlsx');
    
        }


}
