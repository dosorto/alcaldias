<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller
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

    public function createPermission()
    {
        return view('permission.create');
    }

    public function permissionCreate(Request $request)
    {
        $request->validate([
            'name'=> 'required|unique:roles|max:255|min:4',
            'description'=> 'required|max:255|min:4'
        ]);

        $permission = new Permission();
        $permission->name = $request->name;
        $permission->description = $request->description;
        $permission->save();


        return redirect()->route('roleList')->with('success', 'Permiso creado');
    }

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);

        $permission->delete();
        return redirect()->route('roleList')->with('delete', 'Registro eliminado');
    }

    public function permissionUpdate(Permission $permission)
    {
        return view('permission.update', compact('permission'));
    }

    public function updatePermission(Request $request, Permission $permission)
    {
        $request->validate([
            'name'=> 'required|max:255|min:4',
            'description'=> 'required|max:255|min:4'
        ]);

        $permission->update($request->all());

        return redirect()->route('roleList')->with('success', 'Permiso actualizado');
    }
}
