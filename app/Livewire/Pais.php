<?php

namespace App\Livewire;

use App\Models\Paise;
use Livewire\Component;
use Livewire\WithPagination;

use function Psy\debug;

class Pais extends Component
{
    use WithPagination;
    public bool $deletePaisModal = false;
    public $id_pais,$codigo, $nombre, $iso_code, $search;
    public $updateModal = false;
    public $deleteModal = false;
    public $createModal = false;
    public $paises;
    public $confirmingItemDeletion = false;


    public function confirmItemDeletion( $id)
    {
        $this->confirmingItemDeletion = $id;
    }

    public function render()
    {
        $paises  = Paise::where('nombre', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5);
        //$pais  = Pais::all();
        return view('livewire.pais.pais', ['pais' => $paises]);
    }

    public function resetInputFields(){
        $this->codigo = '';
        $this->nombre = '';
        $this->iso_code = '';
    }

    public function store()
    {
        $validatedData = $this->validate([
        'codigo' => 'required',
        'nombre' => 'required',
        'iso_code' => 'required',
        ]);

        // Agregar el campo 'created_by' antes de crear el registro
        $validatedData['created_by'] = auth()->id(); // Suponiendo que estás utilizando la autenticación de Laravel

        // Crear el registro en la base de datos
        Paise::create($validatedData);
        $this->createModal=false;

        // Resto del código
    }


    public function edit($id)
    {   $this->updateModal=true;
        $paises = Paise::findOrFail($id);
        $this->id_pais = $id;
        $this->codigo = $paises->codigo;
        $this->nombre = $paises->nombre;
        $this->iso_code=$paises->iso_code;
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
            'codigo' => 'required',
            'nombre' => 'required',
            'iso_code' => 'required',
        ]);

        $paises = Paise::find($this->id_pais);
        $paises->update([
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
            'iso_code' =>$this->iso_code
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
        $paises = Paise::find($this->confirmingItemDeletion);
        $paises->delete();
        session()->flash('message', 'Registro eliminado exitosamente.');
        $this->deleteModal = false;
    }



    public function nuevoModal()
    {
        $this->createModal=true;
    }

    
}
