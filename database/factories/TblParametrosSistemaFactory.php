<?php

namespace Database\Factories;

use App\Models\TblParametrosSistema;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TblParametrosSistema>
 */
class TblParametrosSistemaFactory extends Factory
{
    protected $model = TblParametrosSistema::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'codigo_param_sist' => fake()->unique()->slug(),
            'nombre_param_sist' => fake()->words(2, true),
            'valor_param_sist' => fake()->optional()->word(),
            'tipo_dato_param_sist' => 'string',
            'descripcion_param_sist' => fake()->optional()->sentence(),
            'editable_param_sist' => true,
        ];
    }
}
