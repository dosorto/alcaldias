<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations, prueba de fork
     */
    public function up(): void
    {
        Schema::create('aldeas', function (Blueprint $table) {
            $table->id();
            $table->string("codigo");
            $table->string("nombre");
            $table->string("direccion");
            $table->double("latitud");
            $table->double("longitud");
            $table->unsignedBigInteger('municipio_id');
            $table->foreign('municipio_id')->references('id')->on('municipios');
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
        Schema::dropIfExists('aldeas');
    }
};