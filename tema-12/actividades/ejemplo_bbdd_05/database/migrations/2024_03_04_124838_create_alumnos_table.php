<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 32);
            $table->string('apellidos', 60);
            $table->date('fecha_nac');
            $table->char('telefono', 13)->nullable(); // Corregido para permitir nulos
            $table->char('dni', 9)->unique()->nullable(false);
            $table->unsignedBigInteger('curso_id');
            $table->timestamps();

            $table->foreign('curso_id')->references('id')->on('cursos')->onDelete('restrict')->onUpdate('cascade'); // Corregido la sintaxis
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('alumnos'); // Corregido para eliminar la tabla correcta
    }
};

