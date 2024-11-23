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
        Schema::create('empleadoausencia', function (Blueprint $table) {
            $table->increments('IdEmpleadoAusencia');
            $table->integer('CI')->unsigned();
            $table->integer('IdAusencia')->unsigned();
            $table->date('FInicio');
            $table->date('FFin');
            $table->integer('CJefe')->unsigned();
            $table->timestamps();

            // Llaves foráneas
            $table->foreign('CI')->references('CI')->on('empleados')->onDelete('cascade');
            $table->foreign('IdAusencia')->references('id_ausencia')->on('ausencias')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleadoausencia');
    }
};
