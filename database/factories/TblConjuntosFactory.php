<?php

namespace Database\Factories;

use App\Models\TblConjuntos;
use App\Models\TblConjuntosEstados;
use App\Models\TblConjuntosTipos;
use App\Models\TblMunicipios;
use Database\Factories\TblMunicipiosFactory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TblConjuntos>
 */
class TblConjuntosFactory extends Factory
{
    protected $model = TblConjuntos::class;

    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_conjunto' => fake()->company(),
            'nit_conjunto' => fake()->numerify('##########'),
            'direccion_conjunto' => fake()->streetAddress(),
            'telefono_conjunto' => fake()->phoneNumber(),
            'estrato_conjunto' => fake()->numberBetween(1, 6),
            'coeficiente_total_conjunto' => fake()->randomFloat(4, 0, 1),
            'datos_bancarios_conjunto' => null,
            'reglamento_url_conjunto' => null,
            'logo_url_conjunto' => null,
            'portada_url_conjunto' => null,
            'galeria_conjunto' => null,
            'estado_conjunto' => true,
            'conjunto_tipo_id' => TblConjuntosTipos::query()->value('id') ?? TblConjuntosTipos::query()->create([
                'nombre_tipoconj' => 'Tipo',
                'estado_conest' => true,
            ])->id,
            'conjunto_estado_id' => TblConjuntosEstados::query()->value('id') ?? TblConjuntosEstados::query()->create([
                'nombre_conjesta' => 'Estado',
                'estado_conjesta' => true,
            ])->id,
            'municipio_id' => TblMunicipios::query()->value('id') ?? TblMunicipiosFactory::new()->create()->id,
        ];
    }
}
