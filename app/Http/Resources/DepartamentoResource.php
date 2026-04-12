<?php

namespace App\Http\Resources;

use App\Domain\Departamento\Entities\Departamento;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Departamento
 */
class DepartamentoResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Departamento $d */
        $d = $this->resource;

        return [
            'id' => $d->id(),
            'codigo_dane_departam' => $d->codigoDaneDepartam(),
            'nombre_departam' => $d->nombreDepartam(),
            'estado_departam' => $d->estadoDepartam(),
            'pais_id' => $d->paisId(),
        ];
    }
}
