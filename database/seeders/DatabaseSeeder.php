<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1)->create();

        $role = Role::find(1);

        User::factory()->create([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => '12345678',
        ])->assignRole($role);

        $this->call([
            RoleSeeder::class,
            PaisesSeeder::class,
            DepartamentoSeeder::class,
            MunicipioSeeder::class,
            AldeaSeeder::class,
            TipoDocumentoSeeder::class,
            ProfesionSeeder::class,
            NivelSerSeeder::class,
            TipoSerSeeder::class
        ]);

        User::factory()->count(50)->create();
    }
}
