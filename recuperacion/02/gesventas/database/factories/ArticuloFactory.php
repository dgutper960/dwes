<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

use App\Models\Articulo;
use App\Models\Categoria;

class ArticuloFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Articulo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        // Nos aseguramos de que solo busca entre categorias existentes
        $categories = Categoria::all()->pluck('id')->toArray();

        return [
            'Descripcion' => $this->faker->randomElement(['Herramientas', 'Baño', 'Cocina', 'Bricolaje']),
            'categoria_id' => $this->faker->randomElement($categories), // usamos el array de categorias obtenidas
            'stock' => $this->faker->randomElement([22, 44, 55, 66, 77, 88]),
            'Precio_Coste' => $this->faker->randomElement([222, 442, 535, 646, 775, 885]),
            'Precio_Venta' => $this->faker->randomElement([2232, 4424, 5355, 6646, 7775, 8885]),
        ];
    }
}
