<?php

namespace App\Http\Resources;

use App\Domain\Unidad\Entities\Unidad;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Unidad
 */
class UnidadResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Unidad $u */
        $u = $this->resource;

        return [
            'id' => $u->id(),
            'numero_unidad' => $u->numeroUnidad(),
            'codigo_unidad' => $u->codigoUnidad(),
            'piso_unidad' => $u->pisoUnidad(),
            'area_m2_unidad' => $u->areaM2Unidad(),
            'coeficiente_unidad' => $u->coeficienteUnidad(),
            'estado_unidad' => $u->estadoUnidad(),
            'bloque_id' => $u->bloqueId(),
            'conjunto_id' => $u->conjuntoId(),
            'estado_ocupacion_id' => $u->estadoOcupacionId(),
        ];
    }
}
