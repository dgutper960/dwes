<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticulosSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('articulos')->insert([
            [
                'Descripcion' => 'Lavadora LG',
                'categoria_id' => 1,
                'stock' => 15,
                'Precio_Coste' => 430.99,
                'Precio_Venta' => 699.99
            ],
            [
                'Descripcion' => 'Sofá Cama Eco',
                'categoria_id' => 2,
                'stock' => 5,
                'Precio_Coste' => 221.99,
                'Precio_Venta' => 499.99
            ]
        ]);
    }
}
