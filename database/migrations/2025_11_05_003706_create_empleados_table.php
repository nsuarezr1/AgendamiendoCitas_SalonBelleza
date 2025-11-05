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
    Schema::create('empleados', function (Blueprint $table) {
        $table->id('idEmpleado');
        $table->unsignedBigInteger('idPersona');
        $table->enum('Especialidad', ['Estilista', 'Manicurista', 'Pedicurista', 'Maquillador', 'Barbero']);
        $table->foreign('idPersona')->references('idPersona')->on('personas')->onDelete('cascade');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
