<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;


class RoleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('can:Acceso total')->only(['roleList','createRole', 'destroy', 'roleUpdate']);
        $this->middleware('can:Listar roles')->only('roleList');
        $this->middleware('can:Crear rol')->only('createRole');
        $this->middleware('can:Editar rol')->only('roleUpdate');
        $this->middleware('can:Eliminar role')->only('destroy');

    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function roleList()
    {
        $roles = Role::all();
        if($roles->count() > 5)
        {
            $roles = Role::simplePaginate(5);
            $permissions = Permission::simplePaginate(5);
            return view('role.list')->with(['roles' => $roles, 'permissions' => $permissions]);
        }
        $roles = Role::all();
        return view('role.list')->with(['roles' => $roles]);
        
    }
    
    public function createRole()
    {
        $permissions = Permission::all();
        return view('role.create', compact('permissions'));
    }

    public function roleCreate(Request $request)
    {
        $request->validate([
            'name'=> 'required|unique:roles|max:255|min:4',
            'description'=> 'required|max:255|min:4',
            'permission'=> 'required|array',
            'permission'=> 'exists:permission,id'
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

        $role->permissions()->attach($request->permissions);

        return redirect()->route('roleList')->with('success', 'Role creado');
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        $role->delete();
        return redirect()->route('roleList')->with('delete', 'Registro eliminado');
    }

    public function roleUpdate(Role $role)
    {
        $permissions = Permission::all();
        return view('role.update', compact('role', 'permissions'));
    }

    public function updateRole(Request $request, Role $role)
    {
        $request->validate([
            'name'=> 'required|max:255|min:4',
            'description'=> 'required|max:255|min:4',
            'permission'=> 'required|array',
            'permission'=> 'exists:permission,id'
        ]);

        $role->update($request->all());
        $role->permissions()->sync($request->permissions);


        return redirect()->route('roleList')->with('success', 'Rol actualizado');
    }

}
