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
        Schema::create('horarioasignado', function (Blueprint $table) {
            
          $table->increments('IdHorarioAsignado');
          $table->integer('CI')->unsigned();
          $table->integer('IdHorario')->unsigned();
          $table->date('FAsignacion');
          $table->string('CausaHorario', 255);
          $table->timestamps();
        
          $table->foreign('CI')->references('CI')->on('empleados')->onDelete('cascade');
          $table->foreign('IdHorario')->references('IdHorario')->on('horarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('horarioasignado');
    }
};
