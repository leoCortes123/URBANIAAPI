<?php

namespace App\Http\Resources;

use App\Domain\Bloque\Entities\Bloque;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Bloque
 */
class BloqueResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Bloque $b */
        $b = $this->resource;

        return [
            'id' => $b->id(),
            'nombre_bloque' => $b->nombreBloque(),
            'descripcion_bloque' => $b->descripcionBloque(),
            'numero_unidades_bloque' => $b->numeroUnidadesBloque(),
            'orden_bloque' => $b->ordenBloque(),
            'estado_bloque' => $b->estadoBloque(),
            'conjunto_id' => $b->conjuntoId(),
        ];
    }
}
