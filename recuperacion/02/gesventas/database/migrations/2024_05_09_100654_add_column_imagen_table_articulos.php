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
        Schema::table('articulos', function (Blueprint $table) {
            // Añadimos el campo imagen a la tabla articulos debajo del campo Descripcion
            $table->string('imagen')->nullable()->after('Descripcion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articulos', function (Blueprint $table) {
            // Elimina el campo imagen de la tabla articulos
            $table->dropColumn('imagen');
        });
    }
};
