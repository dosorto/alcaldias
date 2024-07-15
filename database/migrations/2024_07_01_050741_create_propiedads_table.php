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
        Schema::create('propiedads', function (Blueprint $table) {
            $table->id();
            $table->integer("ClaveCatastral");
            $table->unsignedBigInteger('IdContribuyente');
            $table->unsignedBigInteger('IdTipoPropiedad');
            $table->unsignedBigInteger('IdBarrio');
            // $table->string("Direccion");
            $table->string("Direccion", 100)->nullable();

            $table->integer("created_by");
            $table->integer("deleted_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('IdContribuyente')->references('id')->on('contribuyentes')->onDelete('restrict');
            $table->foreign('IdTipoPropiedad')->references('id')->on('tipo_propiedads')->onDelete('restrict');
            $table->foreign('IdBarrio')->references('id')->on('barrios')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('propiedads');
    }
};
