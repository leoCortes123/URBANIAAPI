<?php

namespace Database\Factories;

use App\Models\TblCategoriasConceptos;
use App\Models\TblConceptosCobro;
use Database\Factories\TblCategoriasConceptosFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TblConceptosCobro>
 */
class TblConceptosCobroFactory extends Factory
{
    protected $model = TblConceptosCobro::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'categoria_concepto_id' => TblCategoriasConceptos::query()->value('id') ?? TblCategoriasConceptosFactory::new()->create()->id,
            'codigo_concepto' => fake()->unique()->bothify('CC##'),
            'nombre_concepto' => fake()->words(2, true),
            'descripcion_concepto' => null,
            'valor_base_concepto' => fake()->randomFloat(2, 10, 500),
            'periodicidad_concepto' => 'mensual',
            'activo_concepto' => true,
        ];
    }
}
