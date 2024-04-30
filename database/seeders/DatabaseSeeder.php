<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Periodo;
use App\Models\User;
use Illuminate\Database\Seeder;
use PhpParser\Node\Expr\Assign;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(1)->create();



        $this->call([
            RoleSeeder::class,
            PaisesSeeder::class,
            DepartamentoSeeder::class,
            MunicipioSeeder::class,
            AldeaSeeder::class,
            TipoDocumentoSeeder::class,
            ProfesionSeeder::class,
            NivelSerSeeder::class,
            TipoSerSeeder::class,
            BarrioSeeder::class,
            ContribuyenteSeeder::class,
            ServicioSeeder::class,
            AnioSeeder::class,
            PeriodoSeeder::class,
            InformacionSeeder::class

        ]);

        $role = Role::find(1);
        $role2 = Role::find(2);
        $role3 = Role::find(3);
        $role4 = Role::find(4);

        User::factory()->create([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => '12345678',
        ])->assignRole($role);

        User::factory()->create([
        'name' => 'Contador',
        'email' => 'conta@gmail.com',
        'password' => 'conta1234',
        ])->assignRole($role2);

        User::factory()->create([
        'name' => 'Secretario',
        'email' => 'secre@gmail.com',
        'password' => 'secre1234',
        ])->assignRole($role3);

        User::factory()->create([
        'name' => 'User',
        'email' => 'user@gmail.com',
        'password' => 'user1234',
        ])->assignRole($role4);
        User::factory()->count(50)->create();
    }
}