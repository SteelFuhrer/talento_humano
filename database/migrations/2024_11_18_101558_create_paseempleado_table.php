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
            $table->id('idpaseempleado');
            $table->integer('ci')->unsigned();
            $table->date('fecha');
            $table->dateTime('hsalida');
            $table->dateTime('hentrada');
            $table->string('lugar',255);
            $table->integer('id_motivopase')->unsigned();
            $table->integer('cijefe')->unsigned();
            $table->timestamps();

            $table->foreign('ci')->references('ci')->on('empleados')->onDelete('cascade');
            $table->foreign('id_motivopase')->references('id_motivopase')->on('cmotivopase')->onDelete('cascade');
            $table->foreign('cijefe')->references('ci')->on('empleados')->onDelete('cascade');
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
