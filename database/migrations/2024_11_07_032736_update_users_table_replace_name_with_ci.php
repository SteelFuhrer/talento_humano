<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // eliminar campo name
            $table->dropColumn('name');
            
            // añadir campo ci
            $table->unsignedInteger('ci')->nullable()->after('id');
            $table->foreign('ci')->references('ci')->on('empleados')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // restaurar el campo name
            $table->string('name')->after('id');
            
            // eliminar el campo ci y la clave foránea
            $table->dropForeign(['ci']);
            $table->dropColumn('ci');
        });
    }
};
