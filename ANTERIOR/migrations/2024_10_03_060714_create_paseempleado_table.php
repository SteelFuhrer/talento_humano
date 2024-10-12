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
        Schema::create('paseempleado', function (Blueprint $table) {
            $table->increments('IdPaseEmpleado');
            $table->integer('CI')->unsigned();
            $table->date('Fecha');
            $table->dateTime('HSalida');
            $table->dateTime('HEntrada');
            $table->string('Lugar', 255);
            $table->integer('IdMotivoPase')->unsigned();
            $table->integer('CJefe')->unsigned();
            $table->timestamps();

            $table->foreign('CI')->references('CI')->on('empleados')->onDelete('cascade');
            $table->foreign('IdMotivoPase')->references('IdMotivoPase')->on('cmotivopase')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paseempleado');
    }
};
