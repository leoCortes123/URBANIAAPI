<?php

namespace Database\Factories;

use App\Models\TblUsersEstados;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TblUsersEstados>
 */
class TblUsersEstadosFactory extends Factory
{
    protected $model = TblUsersEstados::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_useresta' => fake()->unique()->word(),
            'codigo_useresta' => fake()->optional()->regexify('[A-Z]{2}'),
            'descripcion_useresta' => fake()->optional()->sentence(),
            'orden_useresta' => fake()->optional()->numberBetween(1, 20),
            'estado_useresta' => fake()->optional()->boolean(),
        ];
    }
}
