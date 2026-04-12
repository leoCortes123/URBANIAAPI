<?php

namespace Database\Factories;

use App\Models\TblDepartamentos;
use App\Models\TblPais;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TblDepartamentos>
 */
class TblDepartamentosFactory extends Factory
{
    protected $model = TblDepartamentos::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo_dane_departam' => fake()->optional()->numerify('##'),
            'nombre_departam' => fake()->state(),
            'estado_departam' => fake()->optional()->boolean(),
            'pais_id' => TblPais::query()->value('id') ?? TblPais::query()->create([
                'nombre_pais' => fake()->country(),
            ])->id,
        ];
    }
}
