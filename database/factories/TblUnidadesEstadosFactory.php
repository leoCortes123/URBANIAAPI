<?php

namespace Database\Factories;

use App\Models\TblUnidadesEstados;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TblUnidadesEstados>
 */
class TblUnidadesEstadosFactory extends Factory
{
    protected $model = TblUnidadesEstados::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_unidesta' => fake()->unique()->word(),
            'codigo_unidesta' => fake()->optional()->regexify('[A-Z]{2}'),
            'descripcion_unidesta' => fake()->optional()->sentence(),
            'estado_unidesta' => fake()->optional()->boolean(),
            'orden_unidesta' => fake()->optional()->numberBetween(1, 20),
        ];
    }
}
