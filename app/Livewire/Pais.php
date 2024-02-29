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
    public $pais;
    public $confirmingItemDeletion = false;
    public function confirmItemDeletion( $id)
    {
        $this->confirmingItemDeletion = $id;
    }

    public function render()
    {
        $pais  = Paise::where('nombre', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5);
        //$pais  = Pais::all();
        return view('livewire.pais.pais', ['pais' => $pais]);
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
        $pais = Paise::findOrFail($id);
        $this->id_pais = $id;
        $this->codigo = $pais->codigo;
        $this->nombre = $pais->nombre;
        $this->iso_code=$pais->iso_code;
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

        $pais = Paise::find($this->persona_id);
        $pais->update([
            'codigo' => $this->codigo,
            'nombre' => $this->nombre,
            'iso_code' =>$this->iso_code
        ]);

        $this->updateModal = false;

        session()->flash('message', 'Pais Updated Successfully.');
        $this->resetInputFields();
    }

    public function remove($p)
    {
        $this->deleteModal = true;
        $this->pais = $p;
        $this->dispatch(('delete-modal'));

    }

    public function delete($id)
    {
        Paise::find($id)->delete();
        session()->flash('message', 'Registro eliminado.!');
    }
}
