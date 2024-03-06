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
        Schema::create('servicios', function (Blueprint $table) {
            $table->id();
            $table->string("nombre_servicio");
            $table->string("clave_presupuestaria");
            $table->float("importes");
            $table->date("fecha_creacion");
            $table->boolean("status");

            $table->unsignedBigInteger('nivel_servivio_id');
            $table->foreign('nivel_servivio_id')->references('id')->on('nivelservicios');
            $table->unsignedBigInteger('tipo_servicio_id');
            $table->foreign('tipo_servicio_id')->references('id')->on('tiposervicio');

            $table->integer("created_by");
            $table->integer("deleted_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios');
    }
};
