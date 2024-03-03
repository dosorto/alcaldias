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

    private function resetInputFields(){
        $this->codigo = '';
        $this->nombre = '';
        $this->iso_code = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([

            'codigo' => 'required',
            'nombre' => 'required',
            'iso_code' => 'required',
        ]);

        Paise::create($validatedDate);

        session()->flash('message', 'Pais Created Successfully.');

        $this->resetInputFields();
        $this->dispatch('close-modal');
    }

    public function edit($id)
    {
        $paises = Paise::findOrFail($id);
        $this->id_pais = $id;
        $this->codigo = $paises->codigo;
        $this->nombre = $paises->nombre;
        $this->iso_code=$paises->iso_code;
        $this->dispatch("open-edit");
    }

    public function closeModal()
    {
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

        $paises = Paise::find($this->persona_id);
        $paises->update([
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
            'iso_code' =>$this->iso_code
        ]);

        $this->updateModal = false;

        session()->flash('message', 'Pais Updated Successfully.');
        $this->resetInputFields();
    }

    public function remove($pa)
    {
        $this->deleteModal = true;
        $this->paises = $pa;
        $this->dispatch(('delete-modal'));

    }

    public function delete($id)
    {
        Paise::find($id)->delete();
        session()->flash('message', 'Registro eliminado.!');
    }
}
