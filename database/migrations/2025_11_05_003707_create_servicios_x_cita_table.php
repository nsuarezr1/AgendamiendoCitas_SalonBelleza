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
        if (!Schema::hasTable('serviciosxcita')) {
            Schema::create('serviciosxcita', function (Blueprint $table) {
                $table->id('idServicioxCita');
                $table->unsignedBigInteger('idServicio');
                $table->unsignedBigInteger('idCita');
                $table->dateTime('FechaHora'); // Mantengo esta columna aunque parezca redundante si Citas ya la tiene
                $table->timestamps();
                
                // Claves foráneas
                $table->foreign('idServicio')->references('idServicio')->on('servicios');
                $table->foreign('idCita')->references('idCita')->on('citas');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios_x_cita');
    }
};
