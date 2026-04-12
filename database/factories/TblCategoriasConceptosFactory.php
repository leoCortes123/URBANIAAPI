<?php

namespace Database\Factories;

use App\Models\TblCategoriasConceptos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TblCategoriasConceptos>
 */
class TblCategoriasConceptosFactory extends Factory
{
    protected $model = TblCategoriasConceptos::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_catconc' => fake()->unique()->words(2, true),
            'codigo_catconc' => fake()->optional()->regexify('[A-Z]{3}'),
            'descripcion_catconc' => fake()->optional()->sentence(),
            'orden_catconc' => fake()->optional()->numberBetween(1, 20),
            'estado_catconc' => fake()->optional()->boolean(),
        ];
    }
}
