<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contribuyente;

class ContribuyenteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Contribuyente::create([
            'identidad' => '1234567890',
            'primer_nombre' => 'Juan',
            'segundo_nombre' => 'Carlos',
            'primer_apellido' => 'Pérez',
            'segundo_apellido' => 'González',
            'sexo' => true,
            'impuesto_personal' => 2002,
            'direccion' => 'Calle Principal 123',
            'apartado_postal' => '12345',
            'telefono' => 987654321,
            'fecha_nacimiento' => '1990-05-15',
            'email' => 'juan@example.com',
            'tipo_documento_id' => 1,
            'barrio_id' => 2,
            'profecion_id' => 3,
            'created_by' => 1,
        ]);

        // Agrega más contribuyentes aquí...

        // Ejemplo de otro contribuyente
        Contribuyente::create([
            'identidad' => '9876543210',
            'primer_nombre' => 'María',
            'segundo_nombre' => 'Luisa',
            'primer_apellido' => 'García',
            'segundo_apellido' => 'Martínez',
            'sexo' => false,
            'impuesto_personal' => 2002,
            'direccion' => 'Avenida Central 456',
            'apartado_postal' => '54321',
            'telefono' => 123456789,
            'fecha_nacimiento' => '1985-08-20',
            'email' => 'maria@example.com',
            'tipo_documento_id' => 1,
            'barrio_id' => 1,
            'profecion_id' => 2,
            'created_by' => 1,
        ]);
        Contribuyente::create([
            'identidad' => '77777777',
            'primer_nombre' => 'David',
            'segundo_nombre' => 'Rivera',
            'primer_apellido' => 'Pérez',
            'segundo_apellido' => 'González',
            'sexo' => true,
            'impuesto_personal' => 2002,
            'direccion' => 'Calle Principal 123',
            'apartado_postal' => '12345',
            'telefono' => 987654321,
            'fecha_nacimiento' => '1990-05-15',
            'email' => 'darivera@gmail.com',
            'tipo_documento_id' => 1,
            'barrio_id' => 2,
            'profecion_id' => 3,
            'created_by' => 1,
        ]);
        Contribuyente::create([
            'identidad' => '111111111',
            'primer_nombre' => 'Isaac',
            'segundo_nombre' => 'Rivera',
            'primer_apellido' => 'Pérez',
            'segundo_apellido' => 'González',
            'sexo' => true,
            'impuesto_personal' => 2002,
            'direccion' => 'Calle Principal 123',
            'apartado_postal' => '12345',
            'telefono' => 987654321,
            'fecha_nacimiento' => '1990-05-15',
            'email' => 'isaac@example.com',
            'tipo_documento_id' => 1,
            'barrio_id' => 2,
            'profecion_id' => 3,
            'created_by' => 1,
        ]);
    }

}
