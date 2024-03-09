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
        Schema::create('barrios', function (Blueprint $table) {
            $table->id();     
            $table->string("nombre");
            $table->string("direccion");
            $table->double("latitud");
            $table->double("longitud");
            $table->unsignedBigInteger('aldea_id');
            $table->foreign('aldea_id')->references('id')->on('aldeas');
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
        Schema::dropIfExists('barrios');
    }
};
