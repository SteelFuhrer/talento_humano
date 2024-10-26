<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('departamento', function (Blueprint $table) {
            $table->id('iddpto');
            $table->string('nombredpto', 255);
            $table->unsignedInteger('cijdpto'); // Cambiado a unsignedInteger para que coincida con 'ci' en 'empleados'
            $table->string('correoelectronicodpto', 255);
            $table->string('telefonodpto', 12);
            $table->timestamps();

            // Establecer la relación foránea con la tabla de empleados
            $table->foreign('cijdpto')->references('ci')->on('empleados')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('departamento');
    }
};
