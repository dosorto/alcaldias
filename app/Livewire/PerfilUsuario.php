<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\User;

class PerfilUsuario extends Component
{
    public $image;

    public $user;

    use WithFileUploads;

    public function render()
    {
        return view('livewire.perfil_usuario.perfilusuario');
    }

    public function store($id)
    {
        $this->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Validar que es una imagen válida
        ]);
        
        $this->user = User::find($id);
        $imageName = $this->image->store('images', 'public');

        // Actualiza el campo 'img' del registro con la ruta de la nueva imagen
        $this->user->update(['img' => $imageName]);

        // Resetea la propiedad 'image'
        $this->reset('image');
    }
}
