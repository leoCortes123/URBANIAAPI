<?php

namespace App\Http\Resources;

use App\Domain\UsuarioTipoDocumento\Entities\UsuarioTipoDocumento;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin UsuarioTipoDocumento
 */
class UsuarioTipoDocumentoResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var UsuarioTipoDocumento $usuarioTipoDocumento */
        $usuarioTipoDocumento = $this->resource;

        return [
            'id' => $usuarioTipoDocumento->id(),
            'nombre_tipodocu' => $usuarioTipoDocumento->nombreTipodocu(),
            'codigo_tipodocu' => $usuarioTipoDocumento->codigoTipodocu(),
            'estado_tipodocu' => $usuarioTipoDocumento->estadoTipodocu(),
        ];
    }
}
