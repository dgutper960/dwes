<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriasSeeders extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('categorias')->insert([
            [
                'categoria' => 'Menaje',
                'descripcion' => 'Utensilios de cocina, vajillas, vasos y cubiertos'
            ],
            [
                'categoria' => 'Electrodomésticos',
                'descripcion' => 'Aparatos eléctricos para el hogar'
            ],
            [
                'categoria' => 'Muebles',
                'descripcion' => 'Mobiliario para el hogar'
            ],
            [
                'categoria' => 'Decoración',
                'descripcion' => 'Objetos decorativos para el hogar'
            ]
        ]);
    }
}

