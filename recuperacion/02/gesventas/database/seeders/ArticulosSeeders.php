<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;  // necesario en el seeder
use App\Models\Articulo; // necesario en la factoiria

class ArticulosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Minamos de forma manual (Seeder)

        // DB::table('articulos')->insert([
        //     [
        //         'Descripcion' => 'Cafetera Nespresso',
        //         'categoria_id' => 5,
        //         'stock' => 20,
        //         'Precio_Coste' => 149.99,
        //         'Precio_Venta' => 249.99
        //     ],
        //     [
        //         'Descripcion' => 'Silla Ergonómica',
        //         'categoria_id' => 6,
        //         'stock' => 12,
        //         'Precio_Coste' => 89.99,
        //         'Precio_Venta' => 179.99
        //     ]
        // ]);

        // Añadimos registros de la factoria
        $articulo = Articulo::factory()->count(40)->create();

    }
}
