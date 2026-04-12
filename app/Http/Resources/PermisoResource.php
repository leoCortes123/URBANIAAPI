<?php

namespace App\Http\Resources;

use App\Domain\Permiso\Entities\Permiso;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Permiso
 */
class PermisoResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Permiso $p */
        $p = $this->resource;

        return [
            'id' => $p->id(),
            'codigo_permiso' => $p->codigoPermiso(),
            'nombre_permiso' => $p->nombrePermiso(),
            'modulo_permiso' => $p->moduloPermiso(),
            'descripcion_permiso' => $p->descripcionPermiso(),
        ];
    }
}
