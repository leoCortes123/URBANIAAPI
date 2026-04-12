<?php

namespace Database\Factories;

use App\Models\TblBloques;
use Database\Factories\TblConjuntosFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TblBloques>
 */
class TblBloquesFactory extends Factory
{
    protected $model = TblBloques::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_bloque' => 'Bloque '.fake()->buildingNumber(),
            'descripcion_bloque' => null,
            'numero_unidades_bloque' => fake()->numberBetween(1, 50),
            'orden_bloque' => fake()->numberBetween(1, 10),
            'estado_bloque' => true,
            'conjunto_id' => TblConjuntosFactory::new()->create()->id,
        ];
    }
}
