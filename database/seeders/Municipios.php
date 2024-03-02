<?php

namespace Database\Seeders;

use App\Models\Municipio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Municipios extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Municipio::factory()->count(500)->create();
    }
}
