<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;




class Jaime extends Component

{

    use WithPagination;

    public $roles ;
            public function render()
            {
                
                    $roles = Role::paginate(5); // Paginar los roles
                    return view('livewire.role-pagination', ['roles' => $roles]);
                
            }
}