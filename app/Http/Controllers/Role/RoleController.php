<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;
use App\Models\Roles;


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
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function roleList()
    {
        // $roles = Role::all();
        // if($roles->count() > 5)
        // {
        //     $roles = Role::simplePaginate(5);
        //     $permissions = Permission::simplePaginate(5);
        //     return view('role.list')->with(['roles' => $roles, 'permissions' => $permissions]);
        // }
        $roles = Role::simplePaginate(5);
        $permissions = Permission::simplePaginate(5);
        return view('role.list')->with(['roles' => $roles, 'permissions' => $permissions]);
        
    }
    
    public function roleCreate(Request $request)
    {
        $request->validate([
            'name'=> 'required|unique:roles|max:255|min:4',
            'description'=> 'required|max:255|min:4',
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->description = $request->description;
        $role->save();

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
        return view('role.update', compact('role'));
    }

    public function updateRole(Request $request, Role $role)
    {
        $request->validate([
            'name'=> 'required|unique:roles|max:255|min:4',
            'description'=> 'required|max:255|min:4',
        ]);

        $role->update($request->all());

        return redirect()->route('roleList')->with('success', 'Rol actualizado');
    }

    // public function rolePermission(Role $role)
    // {
    //     $permissions = Permission::simplePaginate(7);
    //     return view('role.aggPermission', compact('role', 'permissions'));
    // }

    // public function rolePermissionAgg(Request $request, Role $role)
    // {
    //     $role->permissions()->sync($request->permissions);
    //     return redirect()->route('roleList')->with('success', 'Permisos Asignados');
    // }


}
