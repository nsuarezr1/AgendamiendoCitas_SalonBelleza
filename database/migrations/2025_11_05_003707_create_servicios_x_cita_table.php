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
    Schema::create('servicios_x_cita', function (Blueprint $table) {
        $table->id('idServicioxCita');
        $table->unsignedBigInteger('idServicio');
        $table->unsignedBigInteger('idCita');
        $table->dateTime('FechaHora');
        $table->foreign('idServicio')->references('idServicio')->on('servicios')->onDelete('cascade');
        $table->foreign('idCita')->references('idCita')->on('citas')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicios_x_cita');
    }
};
