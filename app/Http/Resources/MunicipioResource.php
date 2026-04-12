<?php

namespace App\Http\Resources;

use App\Domain\Municipio\Entities\Municipio;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Municipio
 */
class MunicipioResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Municipio $m */
        $m = $this->resource;

        return [
            'id' => $m->id(),
            'codigo_dane_municipi' => $m->codigoDaneMunicipi(),
            'nombre_municipi' => $m->nombreMunicipi(),
            'estado_municipi' => $m->estadoMunicipi(),
            'departamento_id' => $m->departamentoId(),
        ];
    }
}
