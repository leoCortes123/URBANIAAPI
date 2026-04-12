<?php

namespace Database\Factories;

use App\Models\TblUsersTiposDocumentos;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TblUsersTiposDocumentos>
 */
class TblUsersTiposDocumentosFactory extends Factory
{
    protected $model = TblUsersTiposDocumentos::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_tipodocu' => fake()->unique()->randomElement(['DNI', 'Pasaporte', 'RUC']),
            'codigo_tipodocu' => fake()->optional()->regexify('[A-Z]{2}'),
            'estado_tipodocu' => fake()->optional()->boolean(),
        ];
    }
}
