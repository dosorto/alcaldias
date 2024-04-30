<?php

namespace App\Livewire\Usuarios;
use App\Exports\UserExport;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

use Livewire\Component;

class Usuarios extends Component
{
    // public $users;

    use WithPagination;

    public $roles;

    public $updateModal = false;
    public $deleteModal = false;

    public $name,$id,$rol,$email,$password,$search;

    public $createModal = false;

    public $confirmingItemDeletion = false;

    public function confirmItemDeletion( $id)
    {
        $this->confirmingItemDeletion = $id;
    }

    public function mount(){
        // $this->users = User::all();
        $this->roles = Role::all();
    }

    public function render()
    {
        $users = User::where('name', 'like', '%'.$this->search.'%')
                     ->orderBy('id', 'DESC')
                     ->paginate(5);
        return view('livewire.usuarios.usuarios',['users' => $users]);
    }

    public function store()
    {
        $role=Role::find(4);
        $validatedData = $this->validate([
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        ]);

        $validatedData['created_by'] = auth()->id();
        $validatedData['img'] = 'images/usuario.png';

        User::create($validatedData);
        session()->flash('message', 'Se ha creado exitosamente');
        $this->createModal=false;
        $this->resetInputFields();


    }

    public function openModalCreate()
    {
        $this->createModal=true;
    }

    public function closeModal()
    {
        $this->deleteModal = false;
        $this->createModal = false;
        $this->updateModal = false;
        $this->resetInputFields();
    }

    public function resetInputFields(){
        $this->name = '';
        $this->id = '';
        $this->email = '';
        $this->password = '';

    }

    public function edit($id)
    {   $this->updateModal=true;
        $users = User::findOrFail($id);
        $this->name = $users->name;
        $this->email = $users->email;
        $this->id = $users->id;
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $users = user::find($this->id);
        $users->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);

        $this->updateModal = false;

        session()->flash('message', 'user Updated Successfully.');
        $this->resetInputFields();
    }

    public function remove($id)
    {
        $this->deleteModal = true;
        $this->confirmingItemDeletion = $id;

    }

    public function delete()
    {
        $users = User::find($this->confirmingItemDeletion);
        $users->delete();
        session()->flash('message', 'Registro eliminado exitosamente.');
        $this->deleteModal = false;
        $this->resetInputFields();
    }

    public function export(){
        return Excel::download(new UserExport,'Ususarios.xlsx');
    }


}
