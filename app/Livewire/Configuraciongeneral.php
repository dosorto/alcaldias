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
    public $config;

    public function mount()
    {
        $this->config = Informacionalcaldia::find(1);
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
        $config = informacionalcaldia::find(1);
        $imageName = $this->image->store('images', 'public'); // Almacenar la imagen en storage/app/public/images
        $config->img = $imageName;
        $config->save();
        return redirect()->to('/configuracion');
    }

    public function updatealcaldia()
    {
        $alcaldia = informacionalcaldia::findOrFail(1);
        $alcaldia->nombre_alcaldia = $this->alcaldia;
        $alcaldia->nombre_alcalde = $this->alcalde;
        $alcaldia->direccion = $this->direccion;
        $alcaldia->telefono = $this->telefono;
        $alcaldia->correo = $this->correo;
        $alcaldia->correo_notificaciones = $this->correo_notificaciones;
        $alcaldia->contrasenia = $this->contrasenia;
        $alcaldia->save();
    }
}
