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
            $table->increments('CI');
            $table->string('Nombre', 255);
            $table->string('Apellido', 255);
            $table->string('Apellido2', 255);
            $table->char  ('Sexo', 1);
            $table->string('DireccionParticular', 255);
            $table->string('LugarNacimiento', 255);
            $table->string('TelefonoMovil', 12);
            $table->string('CorreoElectronico', 255);
            $table->string('EstCivil', 50);
            $table->string('ColorPelo', 50);
            $table->string('Estatura', 50);
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
