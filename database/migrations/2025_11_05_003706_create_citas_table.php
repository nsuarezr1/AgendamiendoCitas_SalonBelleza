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
        if (!Schema::hasTable('citas')) {
            Schema::create('citas', function (Blueprint $table) {
                $table->id('idCita');
                $table->unsignedBigInteger('idCliente');
                $table->unsignedBigInteger('idEmpleado');
                $table->dateTime('FechaHora');
                // Valores de ENUM con default para evitar nulos y dar estado inicial
                $table->enum('Estado', ['Pendiente', 'Confirmada', 'Completada', 'Cancelada'])->default('Pendiente'); 
                $table->timestamps();

                // Claves foráneas
                $table->foreign('idCliente')->references('idCliente')->on('clientes');
                $table->foreign('idEmpleado')->references('idEmpleados')->on('empleados'); 
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('citas');
    }
};
