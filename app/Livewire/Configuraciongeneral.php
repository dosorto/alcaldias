<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class Configuraciongeneral extends Component
{
    use WithFileUploads;
    public $image;
    
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
    session()->flash('image', $imagePath);
}
}
