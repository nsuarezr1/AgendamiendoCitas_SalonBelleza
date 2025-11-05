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
    if (!Schema::hasTable('Citas')) {
            Schema::create('Citas', function (Blueprint $table) {
                $table->id('idCita');
                $table->unsignedBigInteger('idCliente');
                $table->unsignedBigInteger('idEmpleado');
                $table->dateTime('FechaHora');
                // Asegúrate de que este ENUM tenga valores definidos si no lo hiciste
                $table->enum('Estado', ['Pendiente', 'Confirmada', 'Completada', 'Cancelada'])->default('Pendiente'); 
                $table->timestamps();

                // Claves foráneas (si se definen aquí, asegúrate que las tablas referenciadas existan)
                $table->foreign('idCliente')->references('idCliente')->on('Clientes');
                $table->foreign('idEmpleado')->references('idEmpleados')->on('Empleados');
            });
        }
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personas');
    }
};
