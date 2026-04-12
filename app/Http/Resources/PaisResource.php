<?php

namespace App\Http\Resources;

use App\Domain\Pais\Entities\Pais;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Pais
 */
class PaisResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Pais $pais */
        $pais = $this->resource;

        return [
            'id' => $pais->id(),
            'codigo_pais' => $pais->codigoPais(),
            'nombre_pais' => $pais->nombrePais(),
            'codigo_iso_pais' => $pais->codigoIsoPais(),
            'estado_pais' => $pais->estadoPais(),
        ];
    }
}
