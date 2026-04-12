<?php

namespace App\Http\Resources;

use App\Domain\ParametroSistema\Entities\ParametroSistema;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ParametroSistema
 */
class ParametroSistemaResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var ParametroSistema $p */
        $p = $this->resource;

        return [
            'id' => $p->id(),
            'codigo_param_sist' => $p->codigoParamSist(),
            'nombre_param_sist' => $p->nombreParamSist(),
            'valor_param_sist' => $p->valorParamSist(),
            'tipo_dato_param_sist' => $p->tipoDatoParamSist(),
            'descripcion_param_sist' => $p->descripcionParamSist(),
            'editable_param_sist' => $p->editableParamSist(),
        ];
    }
}
