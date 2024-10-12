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
        Schema::create('entradasalida', function (Blueprint $table) {
            $table->increments('IdES');
            $table->integer('CI')->unsigned();
            $table->dateTime('FechaHora');
            $table->integer('IdTipoES')->unsigned();
            $table->timestamps();
    
            // Llaves foráneas
            $table->foreign('CI')->references('CI')->on('empleados')->onDelete('cascade');
            $table->foreign('IdTipoES')->references('IdTipoES')->on('ctipoes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradasalida');
    }
};
