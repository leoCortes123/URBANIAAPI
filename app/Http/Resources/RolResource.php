<?php

namespace App\Http\Resources;

use App\Domain\Rol\Entities\Rol;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Rol
 */
class RolResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Rol $rol */
        $rol = $this->resource;

        return [
            'id' => $rol->id(),
            'nombre_rol' => $rol->nombreRol(),
            'codigo_rol' => $rol->codigoRol(),
            'descripcion_rol' => $rol->descripcionRol(),
            'nivel_rol' => $rol->nivelRol(),
            'estado_rol' => $rol->estadoRol(),
        ];
    }
}
