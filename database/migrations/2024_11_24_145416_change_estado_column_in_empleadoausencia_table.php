<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        // Borrar todos los registros existentes en la tabla `empleadoausencia`
        DB::table('empleadoausencia')->truncate();

        // Cambiar el tipo de dato de la columna `estado` a boolean
        Schema::table('empleadoausencia', function (Blueprint $table) {
            $table->boolean('estado')->default(false)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        // Revertir los cambios en la columna `estado`
        Schema::table('empleadoausencia', function (Blueprint $table) {
            $table->string('estado')->nullable()->change();
        });
    }
};
