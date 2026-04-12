<?php

namespace App\Http\Resources;

use App\Domain\ConjuntoUsuario\Entities\ConjuntoUsuario;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ConjuntoUsuario
 */
class ConjuntoUsuarioResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var ConjuntoUsuario $c */
        $c = $this->resource;

        return [
            'id' => $c->id(),
            'user_id' => $c->userId(),
            'conjunto_id' => $c->conjuntoId(),
            'fecha_vinculacion' => $c->fechaVinculacion(),
            'estado_conjuser' => $c->estadoConjuser(),
        ];
    }
}
