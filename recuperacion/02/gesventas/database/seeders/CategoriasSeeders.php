<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; // necesario en el seeder
use App\Models\Categoria; // necesario en la factoria

class CategoriasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Minamos de forma manual

        // DB::table('categorias')->insert([
        //     [
        //         'categoria' => 'Electrónica',
        //         'descripcion' => 'Dispositivos electrónicos y accesorios'
        //     ],
        //     [
        //         'categoria' => 'Jardinería',
        //         'descripcion' => 'Herramientas y accesorios para el jardín'
        //     ]
        // ]);

        // Añadimos registros de la factoria
        Categoria::factory()->count(20)->create();

    }
}

