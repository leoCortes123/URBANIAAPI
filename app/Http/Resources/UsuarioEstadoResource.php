<?php

namespace App\Http\Resources;

use App\Domain\UsuarioEstado\Entities\UsuarioEstado;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin UsuarioEstado
 */
class UsuarioEstadoResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var UsuarioEstado $usuarioEstado */
        $usuarioEstado = $this->resource;

        return [
            'id' => $usuarioEstado->id(),
            'nombre_useresta' => $usuarioEstado->nombreUseresta(),
            'codigo_useresta' => $usuarioEstado->codigoUseresta(),
            'descripcion_useresta' => $usuarioEstado->descripcionUseresta(),
            'orden_useresta' => $usuarioEstado->ordenUseresta(),
            'estado_useresta' => $usuarioEstado->estadoUseresta(),
        ];
    }
}
