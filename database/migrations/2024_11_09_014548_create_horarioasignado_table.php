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
            $table->bigIncrements('id'); 
            $table->unsignedInteger('ci'); 
            $table->unsignedBigInteger('id_horario'); 
            $table->date('FAsignacion');
            $table->string('CausaHorario', 255);
            $table->timestamps();
        
            // Relación de clave foránea
            $table->foreign('ci')->references('ci')->on('empleados')->onDelete('cascade');
            $table->foreign('id_horario')->references('id')->on('horarios')->onDelete('cascade');
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

