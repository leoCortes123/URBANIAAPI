<?php

namespace Database\Factories;

use App\Models\TblConjuntosEstados;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TblConjuntosEstados>
 */
class TblConjuntosEstadosFactory extends Factory
{
    protected $model = TblConjuntosEstados::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_conjesta' => fake()->unique()->word(),
            'descripcion_conjesta' => fake()->optional()->sentence(),
            'orden_conjesta' => fake()->optional()->numberBetween(1, 20),
            'estado_conjesta' => fake()->optional()->boolean(),
        ];
    }
}
