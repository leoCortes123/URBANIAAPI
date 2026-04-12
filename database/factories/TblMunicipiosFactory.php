<?php

namespace Database\Factories;

use App\Models\TblMunicipios;
use Database\Factories\TblDepartamentosFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TblMunicipios>
 */
class TblMunicipiosFactory extends Factory
{
    protected $model = TblMunicipios::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo_dane_municipi' => fake()->optional()->numerify('#####'),
            'nombre_municipi' => fake()->city(),
            'estado_municipi' => fake()->optional()->boolean(),
            'departamento_id' => TblDepartamentosFactory::new()->create()->id,
        ];
    }
}
