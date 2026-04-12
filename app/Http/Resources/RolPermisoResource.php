<?php

namespace App\Http\Resources;

use App\Domain\RolPermiso\Entities\RolPermiso;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin RolPermiso
 */
class RolPermisoResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var RolPermiso $r */
        $r = $this->resource;

        return [
            'id' => $r->id(),
            'rol_id' => $r->rolId(),
            'permiso_id' => $r->permisoId(),
        ];
    }
}
