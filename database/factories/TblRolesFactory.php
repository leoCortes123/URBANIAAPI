<?php

namespace Database\Factories;

use App\Models\TblRoles;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TblRoles>
 */
class TblRolesFactory extends Factory
{
    protected $model = TblRoles::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_rol' => fake()->unique()->jobTitle(),
            'codigo_rol' => fake()->unique()->regexify('[A-Z]{3}'),
            'descripcion_rol' => fake()->optional()->sentence(),
            'nivel_rol' => fake()->optional()->numberBetween(1, 10),
            'estado_rol' => fake()->optional()->boolean(),
        ];
    }
}
