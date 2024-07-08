<?php

namespace App\Livewire\Georeferenciacion;

use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Georeferenciacion;

class Georreferenciacion extends Component
{
    use WithPagination;
    public $IdGeoreferenciacion, $latitud, $longitud, $area, $perimetro;
    public $isOpen = 0;

    public $confirmingItemDeletion;

    public $deleteModal=false;

    public function render()
    {
        $georreferenciacion = Georeferenciacion::paginate(5);
        return view('livewire.georreferenciacion.georreferenciacion', ['georreferenciacion' => $georreferenciacion]);
    }

    public function create()
    {
        $this->resetInputFields();
        $this->openModal();
    }
    public function openModal()
    {
        $this->isOpen = true;
    }
    public function closeModal()
    {
        $this->isOpen = false;
    }

    private function resetInputFields()
    {
        $this->latitud = '';
        $this->longitud = '';
        $this->area = '';
        $this->perimetro = '';
        $this->IdGeoreferenciacion= '';
       
    }

    public function store()
    {
            $this->validate([
            'latitud' => 'required',
            'longitud' => 'required',
            'area' => 'required',
            'perimetro' => 'required',
        ]);

        
        Georeferenciacion::updateOrCreate( ['id' => $this-> IdGeoreferenciacion],[
            'latitud' => $this->latitud,
            'longitud' => $this->longitud,
            'area' => $this->area,
            'perimetro' => $this->perimetro
        ]);
  

        session()->flash(
            'message',
            $this->IdGeoreferenciacion ? 'Información Actualizada correctamente!' : 'Georreferenciación creada correctamente!'
        );
        $this->closeModal();
        $this->resetInputFields();
        $this->dispatch('close-modal');

    }

    public function remove($id)
    {
        $this->deleteModal = true;
        // se asigna el id del registro a la variable confirmingItemDeletion
        $this->confirmingItemDeletion = $id;

    }
    public function edit($id)
    {
        $georreferenciacion = Georeferenciacion::findOrFail($id);
        $this->IdGeoreferenciacion = $id;
        $this->latitud = $georreferenciacion->latitud;
        $this->longitud = $georreferenciacion->longitud;
        $this->area = $georreferenciacion->area;
        $this->perimetro = $georreferenciacion->perimetro;

        $this->openModal();
    }

    public function delete()
    {
        Georeferenciacion::findOrFail($this->confirmingItemDeletion)->delete();
        session()->flash('message', 'Registro Eliminado correctamente!');
        $this ->deleteModal = false;
    }

    public function closeModalDelete()
    {
        $this->deleteModal = false;
    }
}