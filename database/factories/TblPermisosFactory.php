<?php

namespace Database\Factories;

use App\Models\TblPermisos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TblPermisos>
 */
class TblPermisosFactory extends Factory
{
    protected $model = TblPermisos::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo_permiso' => fake()->optional()->bothify('perm_##'),
            'nombre_permiso' => fake()->words(3, true),
            'modulo_permiso' => fake()->word(),
            'descripcion_permiso' => fake()->optional()->sentence(),
        ];
    }
}
