<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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

        $this->call([
            RoleSeeder::class
        ]);

        $role = Role::find(1);
        
        \App\Models\User::factory()->create([
        'name' => 'Admin',
        'email' => 'admin@gmail.com',
        'password' => '12345678'
        ])->assignRole($role);;

        
    }
}
