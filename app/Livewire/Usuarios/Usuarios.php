<?php

namespace App\Livewire\Usuarios;
use App\Models\User;
use Spatie\Permission\Models\Role;

use Livewire\Component;

class Usuarios extends Component
{
    public $users;

    public $roles;

    public function mount(){
        $this->users = User::all();
        $this->roles = Role::all();
    }

    public function render()
    {
        return view('livewire.usuarios.usuarios');

    }
}
