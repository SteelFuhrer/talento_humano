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
            $table->increments('ci');
            $table->string('nombre', 255);
            $table->string('apellido', 255);
            $table->string('apellido2', 255)->nullable();
            $table->string('sexo', 1);
            $table->string('direccionparticular', 255);
            $table->string('lugarnacimiento', 255);
            $table->string('telefonomovil', 12);
            $table->string('correoelectronico', 255);
            $table->string('estcivil', 50);
            $table->string('colorpelo', 50);
            $table->string('estatura', 50);
            $table->integer('iddpto')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
