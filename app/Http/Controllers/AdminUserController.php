<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;

class AdminUserController extends Controller
{
    public function index()
    {
        
        return view('admin.users.index');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        return redirect()->route('admin.users.index');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.users.index');
    }

    public function assignRole(Request $request)
    {
        $user = User::find($request->user_id);

        // Verificar si el usuario existe
        if (!$user) {
            return redirect()->back()->with('error', 'El usuario no existe');
        }

        // Asignar el rol al usuario
        $user->assignRole($request->role);

        return redirect()->back()->with('success', 'Rol asignado correctamente');
    }




}

