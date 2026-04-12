<?php

namespace App\Http\Resources;

use App\Domain\Usuario\Entities\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Usuario
 */
class UsuarioResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Usuario $u */
        $u = $this->resource;

        return [
            'id' => $u->id(),
            'name' => $u->name(),
            'email' => $u->email(),
            'documento' => $u->documento(),
            'telefono' => $u->telefono(),
            'foto_url' => $u->fotoUrl(),
            'estado' => $u->estado(),
            'ultimo_acceso' => $u->ultimoAcceso()?->format(\DateTimeInterface::ATOM),
            'tipo_documento_id' => $u->tipoDocumentoId(),
            'rol_id' => $u->rolId(),
            'users_estado_id' => $u->usersEstadoId(),
        ];
    }
}
