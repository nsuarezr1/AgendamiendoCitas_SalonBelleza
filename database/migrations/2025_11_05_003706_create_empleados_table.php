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
        if (!Schema::hasTable('empleados')) {
            Schema::create('empleados', function (Blueprint $table) {
                $table->id('idEmpleados'); 
                $table->unsignedBigInteger('idPersona');
                // Definiendo valores por defecto para ENUM
                $table->enum('Especialidad', ['Corte', 'Tinte', 'Masaje', 'Manicura']); 
                $table->timestamps();

                // Clave foránea a Personas
                $table->foreign('idPersona')->references('idPersona')->on('personas')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
