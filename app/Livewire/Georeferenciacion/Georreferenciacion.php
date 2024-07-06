<?php

namespace App\Livewire\Georeferenciacion;
use Livewire\WithPagination;
use Livewire\Component;
use App\Models\Georeferenciacion;

class Georreferenciacion extends Component
{
   use WithPagination;
   public $latitud, $longitud, $area, $perimetro;
   public $isOpen = 0;
   
   public function render()
   {
       $georreferenciacion = Georreferenciacion::where('area', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5);
       return view('livewire.georreferenciacion.georreferenciaciones', ['georreferenciaciones' => $georreferenciacion]);
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

   private function resetInputFields(){
      $this->latitud = '';
      $this->longitud = '';
      $this->area = '';
      $this->perimetro = '';
      $this-> IdGeoreferenciacion = '';
  }

  public function store()
  {
      $this->validate([
          'latitud' => 'required',
          'longitud' => 'required',
          'area' => 'required',
          'perimetro' => 'required',
      ]);
   

      Georeferenciacion::updateOrCreate(['id' => $this->IdGeoreferenciacion], [
         'latitud' => $this->latitud,
         'longitud' => $this->longitud,
         'area' => $this->area,
         'perimetro' => $this->perimetro
      ]);

      session()->flash('message', 
            $this->IdGeoreferenciacion ? 'Información Actualizada correctamente!' : 'Georeferenciación creada correctamente!');
  
        $this->closeModal();
        $this->resetInputFields();

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

    public function delete($id)
    {
        Georeferenciacion::find($id)->delete();
        session()->flash('message', 'Registro Eliminado correctamente!');
    }
}