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
            $table->increments('IdRetraso');
            $table->integer('CI')->unsigned();
            $table->integer('IdTipoRetraso')->unsigned();
            $table->date('Fecha');
            $table->integer('Minutos');
            $table->string('Observacion', 255)->nullable();
            $table->timestamps();
    
            $table->foreign('CI')->references('CI')->on('empleados')->onDelete('cascade');
            $table->foreign('IdTipoRetraso')->references('IdTipoRetraso')->on('ctiporetraso')->onDelete('cascade');
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
