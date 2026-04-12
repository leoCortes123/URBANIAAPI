<?php

namespace App\Http\Resources;

use App\Domain\ConjuntoEstado\Entities\ConjuntoEstado;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ConjuntoEstado
 */
class ConjuntoEstadoResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var ConjuntoEstado $conjuntoEstado */
        $conjuntoEstado = $this->resource;

        return [
            'id' => $conjuntoEstado->id(),
            'nombre_conjesta' => $conjuntoEstado->nombreConjesta(),
            'descripcion_conjesta' => $conjuntoEstado->descripcionConjesta(),
            'orden_conjesta' => $conjuntoEstado->ordenConjesta(),
            'estado_conjesta' => $conjuntoEstado->estadoConjesta(),
        ];
    }
}
