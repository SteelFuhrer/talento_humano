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
        Schema::create('retraso', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('ci'); // Relación con empleados
            $table->unsignedInteger('idtiporetraso'); // Relación con ctiporetraso
            $table->date('fecha');
            $table->time('minutos');
            $table->string('observacion', 255)->nullable();
            $table->timestamps();

            $table->foreign('ci')->references('ci')->on('empleados')->onDelete('cascade');
            $table->foreign('idtiporetraso')->references('idtiporetraso')->on('ctiporetraso')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('retraso');
    }
};