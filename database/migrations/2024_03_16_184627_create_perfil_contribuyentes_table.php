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
        Schema::create('perfil_contribuyentes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("contribuyente_id");
            $table->foreign('contribuyente_id')->references("id")->on("contribuyentes");
            $table->unsignedBigInteger("servicio_id");
            $table->foreign("servicio_id")->references("id")->on("servicios");
            $table->unsignedBigInteger("suscripcions_id");
            $table->foreign("suscripcions_id")->references("id")->on("suscripcions");
            $table->date("fecha_suscripcion");
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
        Schema::dropIfExists('perfil_contribuyentes');
    }
};
