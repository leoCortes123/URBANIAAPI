<?php

namespace App\Http\Resources;

use App\Domain\UnidadOcupante\Entities\UnidadOcupante;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin UnidadOcupante
 */
class UnidadOcupanteResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var UnidadOcupante $u */
        $u = $this->resource;

        return [
            'id' => $u->id(),
            'tipo_ocupante' => $u->tipoOcupante(),
            'es_titular' => $u->esTitular(),
            'fecha_inicio' => $u->fechaInicio(),
            'fecha_fin' => $u->fechaFin(),
            'estado_ocupante' => $u->estadoOcupante(),
            'observaciones' => $u->observaciones(),
            'unidad_id' => $u->unidadId(),
            'user_id' => $u->userId(),
            'conjunto_id' => $u->conjuntoId(),
        ];
    }
}
