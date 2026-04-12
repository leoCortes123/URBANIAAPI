<?php

namespace App\Http\Resources;

use App\Domain\UnidadEstado\Entities\UnidadEstado;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin UnidadEstado
 */
class UnidadEstadoResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var UnidadEstado $unidadEstado */
        $unidadEstado = $this->resource;

        return [
            'id' => $unidadEstado->id(),
            'nombre_unidesta' => $unidadEstado->nombreUnidesta(),
            'codigo_unidesta' => $unidadEstado->codigoUnidesta(),
            'descripcion_unidesta' => $unidadEstado->descripcionUnidesta(),
            'estado_unidesta' => $unidadEstado->estadoUnidesta(),
            'orden_unidesta' => $unidadEstado->ordenUnidesta(),
        ];
    }
}
