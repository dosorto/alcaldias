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
        Schema::create('pago_servicio_has_servicios', function (Blueprint $table) {
            $table->unsignedBigInteger('pago_servicio_id');
            $table->unsignedBigInteger('servicio_id');

            $table->foreign('pago_servicio_id')
                ->references('id') 
                ->on('pago_servicios')
                ->onDelete('cascade');

            $table->foreign('servicio_id')
                ->references('id') 
                ->on('servicios')
                ->onDelete('cascade');
            $table->integer("created_by");
            $table->integer("deleted_by")->nullable();
            $table->integer("updated_by")->nullable();
            $table->softdeletes();
            $table->timestamps();

            $table->primary(['pago_servicio_id', 'servicio_id'], 'pago_servicio_has_servicios_pago_servicio_id_servicio_id_primary');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pago_servicio_has__servicios');
    }
};
