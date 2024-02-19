<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Administrador', 'description' => 'Rol para el super administrador']);
        $role2 = Role::create(['name' => 'Contador', 'description' => 'Rol para el usuario contador']);
        $role3 = Role::create(['name' => 'Secretarial', 'description' => 'Rol para el usuario secretarial']);

        //Permisos para visualizar
        Permission::create(['name' => 'home', 'description' => 'Permiso para poder visualizar el inicio'])->syncRoles([$role1, $role2, $role3]);

        //Permisos para el apartado de rol
        Permission::create(['name' => 'Listar roles', 'description' => 'Permiso para ver la lista de roles'])->assignRole($role1);
        Permission::create(['name' => 'Crear rol', 'description' => 'Permiso para crear un rol'])->assignRole($role1);
        Permission::create(['name' => 'Editar rol', 'description' => 'Permiso para editar un rol'])->assignRole($role1);
        Permission::create(['name' => 'Eliminar Role', 'description' => 'Permiso para ver eliminar un rol'])->assignRole($role1);

        //Permisos para el apartado de permisos
        Permission::create(['name' => 'Listar Permisos', 'description' => 'Permiso para ver la lista de permisos'])->assignRole($role1);
        Permission::create(['name' => 'Crear permiso', 'description' => 'Permiso para crear un permisos'])->assignRole($role1);
        Permission::create(['name' => 'Editar permiso', 'description' => 'Permiso para editar un permiso'])->assignRole($role1);
        Permission::create(['name' => 'Eliminar permiso', 'description' => 'Permiso para eliminar un permiso'])->assignRole($role1);

    }
}
