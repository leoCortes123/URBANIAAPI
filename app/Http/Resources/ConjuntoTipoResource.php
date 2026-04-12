<?php

namespace App\Http\Resources;

use App\Domain\ConjuntoTipo\Entities\ConjuntoTipo;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ConjuntoTipo
 */
class ConjuntoTipoResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var ConjuntoTipo $conjuntoTipo */
        $conjuntoTipo = $this->resource;

        return [
            'id' => $conjuntoTipo->id(),
            'nombre_tipoconj' => $conjuntoTipo->nombreTipoconj(),
            'descripcion_tipoconj' => $conjuntoTipo->descripcionTipoconj(),
            'estado_conest' => $conjuntoTipo->estadoConest(),
        ];
    }
}
