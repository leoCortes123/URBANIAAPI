<?php

namespace Database\Factories;

use App\Models\TblPais;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TblPais>
 */
class TblPaisFactory extends Factory
{
    protected $model = TblPais::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo_pais' => fake()->optional()->numerify('###'),
            'nombre_pais' => fake()->unique()->country(),
            'codigo_iso_pais' => fake()->optional(0.8)->regexify('[A-Z]{2}'),
            'estado_pais' => fake()->optional()->boolean(),
        ];
    }
}
