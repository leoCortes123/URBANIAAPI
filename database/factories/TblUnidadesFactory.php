<?php

namespace Database\Factories;

use App\Models\TblUnidades;
use App\Models\TblUnidadesEstados;
use Database\Factories\TblBloquesFactory;
use Database\Factories\TblUnidadesEstadosFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TblUnidades>
 */
class TblUnidadesFactory extends Factory
{
    protected $model = TblUnidades::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $bloque = TblBloquesFactory::new()->create();

        return [
            'numero_unidad' => (string) fake()->unique()->numberBetween(101, 999),
            'codigo_unidad' => null,
            'piso_unidad' => fake()->numberBetween(1, 20),
            'area_m2_unidad' => fake()->randomFloat(2, 40, 200),
            'coeficiente_unidad' => fake()->randomFloat(4, 0, 1),
            'estado_unidad' => true,
            'bloque_id' => $bloque->id,
            'conjunto_id' => $bloque->conjunto_id,
            'estado_ocupacion_id' => TblUnidadesEstados::query()->value('id') ?? TblUnidadesEstadosFactory::new()->create()->id,
        ];
    }
}
