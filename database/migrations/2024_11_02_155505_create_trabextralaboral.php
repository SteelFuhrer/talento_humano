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
            $table->id('idtrabextralaboral');
            $table->integer('ci')->unsigned();
            $table->string('descripciontrab', 255);
            $table->dateTime('hini');
            $table->dateTime('hfin');
            $table->timestamps();

            //relacion
            $table->foreign('ci')->references('ci')->on('empleados')->onDelete('cascade');
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
