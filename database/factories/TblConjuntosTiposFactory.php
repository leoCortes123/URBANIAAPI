<?php

namespace Database\Factories;

use App\Models\TblConjuntosTipos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TblConjuntosTipos>
 */
class TblConjuntosTiposFactory extends Factory
{
    protected $model = TblConjuntosTipos::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_tipoconj' => fake()->unique()->words(2, true),
            'descripcion_tipoconj' => fake()->optional()->sentence(),
            'estado_conest' => fake()->optional()->boolean(),
        ];
    }
}
