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
        Schema::create('georeferenciacions', function (Blueprint $table) {
            $table->id();
            $table->string('latitud', 50); 
            $table->string('longitud', 50);
            $table->decimal('area')->nullable();
            $table->decimal('perimetro')->nullable();
            
            $table->unsignedBigInteger('IdPropiedad')->nullable();

            $table->integer("created_by");
            $table->integer("deleted_by")->nullable();
            $table->integer("updated_by")->nullable();


            $table->foreign('IdPropiedad')->references('id')->on('propiedads')->onDelete('restrict');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('georeferenciacions');
    }
};