<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradasalidaTable extends Migration
{
    public function up()
    {
        Schema::create('entradasalida', function (Blueprint $table) {
            $table->increments('id'); // ID de la entrada o salida
            $table->integer('ci')->unsigned(); // CI del empleado
            $table->dateTime('fechahora'); // Fecha y hora del registro
            $table->unsignedBigInteger('idtipoes'); // ID de tipo de entrada/salida

            // Relaciones
            $table->foreign('ci')->references('ci')->on('empleados')->onDelete('cascade');
            $table->foreign('idtipoes')->references('id')->on('ctipoes')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('entradasalida');
    }
}
