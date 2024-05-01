<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('informacionalcaldias', function (Blueprint $table) {
            $table->id();
            $table->string("nombre_alcaldia");
            $table->string('img')->nullable();
            $table->string("nombre_alcalde");
            $table->string("direccion");
            $table->integer("telefono");
            $table->string("correo");
            $table->string("correo_notificaciones");
            $table->string("contrasenia");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('informacionalcaldias');
    }
};
