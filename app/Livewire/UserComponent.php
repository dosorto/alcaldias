<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Livewire\WithPagination;


class UserComponent extends Component
{
    use WithPagination;

    public $user;

    public $nombre, $apellido, $persona_id, $search;
    public function render()
    {
        $users = User::all();
        $users  = User::where('name', 'like', '%'.$this->search.'%')->orderBy('id','DESC')->paginate(5);
        return view('livewire.user-component', ['users' => $users]);
    }
}
