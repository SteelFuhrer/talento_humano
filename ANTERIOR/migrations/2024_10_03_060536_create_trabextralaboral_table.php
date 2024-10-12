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
        Schema::create('trabextralaboral', function (Blueprint $table) {
            $table->increments('IdTrabajoExtralaboral');
            $table->integer('CI')->unsigned();
            $table->string('DescripcionTrabajo', 255);
            $table->dateTime('HInicio');
            $table->dateTime('HFin');
            $table->timestamps();
    
            $table->foreign('CI')->references('CI')->on('empleados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trabextralaboral');
    }
};
