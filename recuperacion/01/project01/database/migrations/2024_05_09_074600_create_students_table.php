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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40); //  creamos un nuevo campo
            $table->string('surnames', 60);
            $table->date('birth_date');
            $table->char('phone', 13)->nullable(false); // Valor por defecto
            $table->string('city', 20)->nullable(); // Admite valores null
            $table->char('dni', 9)->unique()->nullable(false); // NOT NULL (por defecto)
            $table->string('email', 40)->unique();
            $table->unsignedBigInteger('course_id');
            $table->timestamps();

            // Restrincion  de clave ajena
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('restrict')->onUpdate('cascade');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
