<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PerfilUsuario extends Component
{
    public $image;

    public $user;
    public $currentPassword;
    public $newPassword;

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


    public function cambiarContraseña($id)
    {
        // Validar los datos de entrada
        $this->user = User::find($id);

        // Comprobar si la contraseña actual es correcta
        if (!Hash::check($this->currentPassword, $this->user->password)) {
            session()->flash('error', 'La contraseña actual es incorrecta.');
            return;
        }

        // Cambiar la contraseña del usuario
        $this->user->update([
            'password' => Hash::make($this->newPassword),
        ]);

        // Limpiar las propiedades
        $this->currentPassword = '';
        $this->newPassword = '';

        // Mostrar un mensaje de éxito
        session()->flash('success', 'La contraseña ha sido cambiada exitosamente.');
    }
}
