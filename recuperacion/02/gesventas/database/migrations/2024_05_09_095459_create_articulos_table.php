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
        Schema::create('articulos', function (Blueprint $table) {
            $table->id();
            $table->string('Descripcion', 100);
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedInteger('stock');
            $table->decimal('Precio_Coste', 10, 2); // Dos posiciones decimales
            $table->decimal('Precio_Venta', 10, 2);
            $table->timestamps();

            // Restrincion de clave ajena
            $table->foreign('categoria_id')
            ->references('id')->on('categorias')->onDelete('restrict')->onUpdate('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articulos');
    }
};
