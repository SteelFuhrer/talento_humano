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
        Schema::create('ctiporetraso', function (Blueprint $table) {
            $table->increments('idtiporetraso'); // Clave primaria autoincrementable
            $table->string('tipoderetraso', 255); // Cadena de texto
            $table->timestamps(); // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ctiporetraso');
    }
};
