<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\Categoria;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Categoria>
 */
class CategoriaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Categoria::class;
    public function definition(): array
    {
        return [
            'categoria' => fake()->randomElement(
                ['Herramientas', 'Vaño', 'Cocina', 'Bricolaje']
            ),

            'descripcion' => fake()->randomElement(
                ['Utensilios', 'Grifos y otras cosas', 'Para el hobby de los machos']
            )
        ];
    }
}
