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
    Schema::create('citas', function (Blueprint $table) {
        $table->id('idCita');
        $table->unsignedBigInteger('idCliente');
        $table->unsignedBigInteger('idEmpleado');
        $table->dateTime('FechaHora');
        $table->enum('Estado', ['Pendiente', 'Confirmada', 'Completada', 'Cancelada'])->default('Pendiente');
        $table->foreign('idCliente')->references('idCliente')->on('clientes')->onDelete('cascade');
        $table->foreign('idEmpleado')->references('idEmpleado')->on('empleados')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
