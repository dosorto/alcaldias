<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use Livewire\WithPagination;

class RoleManager extends Component
{
    use WithPagination;
    
    public $permissions;
    public $role;
    public $name;
    public $description;
    public $search;
    public $selectedPermissions = [];

    public function mount()
    {
        // $this->roles = Role::all();
        $this->permissions = Permission::all();
    }

    public function render()
    {
        $roles = Role::where('name', 'like', '%'.$this->search.'%')
                     ->orderBy('id', 'DESC')
                     ->paginate(5);
                     
        return view('livewire.roles.roles', ['roles' => $roles]);
    }
    

    public function createRole()
    {
        $this->resetInputFields();
        $this->emit('openCreateRoleModal');
    }

    public function store()
    {
        $this->validate([
            'name' => 'required|unique:roles|max:255|min:4',
            'description' => 'required|max:255|min:4',
            'selectedPermissions' => 'required|array',
            'selectedPermissions.*' => 'exists:permissions,id',
        ]);

        $role = Role::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $role->syncPermissions($this->selectedPermissions);

        session()->flash('message', 'Role created successfully.');

        $this->resetInputFields();
        $this->emit('closeCreateRoleModal');
    }

    public function editRole(Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;
        $this->description = $role->description;
        $this->selectedPermissions = $role->permissions->pluck('id')->toArray();
        $this->emit('openEditRoleModal');
    }

    public function updateRole()
    {
        $this->validate([
            'name' => 'required|max:255|min:4',
            'description' => 'required|max:255|min:4',
            'selectedPermissions' => 'required|array',
            'selectedPermissions.*' => 'exists:permissions,id',
        ]);

        $this->role->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        $this->role->syncPermissions($this->selectedPermissions);

        session()->flash('message', 'Role updated successfully.');

        $this->emit('closeEditRoleModal');
    }

    public function deleteRole($roleId)
    {
        Role::findOrFail($roleId)->delete();
        session()->flash('message', 'Role deleted successfully.');
    }

    private function resetInputFields()
    {
        $this->name = '';
        $this->description = '';
        $this->selectedPermissions = [];
    }
}
