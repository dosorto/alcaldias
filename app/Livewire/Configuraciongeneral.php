<?php

namespace App\Livewire;
use App\Models\informacionalcaldia;
use Livewire\Component;
use Livewire\WithFileUploads;

class Configuraciongeneral extends Component
{
    use WithFileUploads;
    public $image;
    public $imagePath;
    public $alcaldia;
    public $alcalde;
    public $direccion;
    public $telefono;
    public $correo;
    public $correo_notificaciones;
    public $contrasenia;

    public function mount()
    {
        $info = informacionalcaldia::findOrFail(1);
        $this->alcaldia = $info->nombre_alcaldia;
        $this->alcalde = $info->nombre_alcalde;
        $this->direccion = $info->direccion;
        $this->telefono = $info->telefono;
        $this->correo = $info->correo;
        $this->correo_notificaciones = $info->correo_notificaciones;
        $this->contrasenia = $info->contrasenia;

        // if (session()->has('image_url')) {
            // $this->imageUrl = session('image_url');
        // }
    }
    
    public function render()
    {
        return view('livewire.configuraciongeneral');
    }

    public function store()
    {
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar que es una imagen válida
        ]);

        // Procesar la imagen después de la validación
        $imagePath = $this->image->store('images', 'public'); // Almacenar la imagen en storage/app/public/images

        session()->flash('success', 'Imagen cargada correctamente.');
        session()->put('image', $imagePath);
    }

    public function updatealcaldia()
    {
        $alcaldia = informacionalcaldia::findOrFail(1);
        $alcaldia->nombre_alcaldia = $this->alcaldia;
        $alcaldia->save();

        session()->flash('success', 'Se ha actualizado el nombre de la Alcaldía');
    }

    public function updatealcalde()
    {
        $alcaldia = informacionalcaldia::findOrFail(1);
        $alcaldia->nombre_alcalde = $this->alcalde;
        $alcaldia->save();

        session()->flash('success', 'Se ha actualizado el nombre del Alcalde');
    }

    public function updatdireccion()
    {
        $alcaldia = informacionalcaldia::findOrFail(1);
        $alcaldia->direccion = $this->direccion;
        $alcaldia->save();

        session()->flash('success', 'Se ha actualizado la dirección');
    }

    public function updatetelefono()
    {
        $alcaldia = informacionalcaldia::findOrFail(1);
        $alcaldia->telefono = $this->telefono;
        $alcaldia->save();

        session()->flash('success', 'Se ha actualizado el número de teléfono');
    }

    public function updatecorreo()
    {
        $alcaldia = informacionalcaldia::findOrFail(1);
        $alcaldia->correo = $this->correo;
        $alcaldia->save();

        session()->flash('success', 'Se ha actualizado el correo electrónico');
    }

    public function updatenotifi()
    {
        $alcaldia = informacionalcaldia::findOrFail(1);
        $alcaldia->correo_notificaciones = $this->correo_notificaciones;
        $alcaldia->save();

        session()->flash('success', 'Se ha actualizado el correo electrónico de notificaciones');
    }

    public function updatecontra()
    {
        $alcaldia = informacionalcaldia::findOrFail(1);
        $alcaldia->contrasenia = $this->contrasenia;
        $alcaldia->save();

        session()->flash('success', 'Se ha actualizado la contraseña de correo de notificaciones');
    }
}
