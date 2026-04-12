<?php

namespace App\Http\Resources;

use App\Domain\ParametroConjunto\Entities\ParametroConjunto;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ParametroConjunto
 */
class ParametroConjuntoResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var ParametroConjunto $p */
        $p = $this->resource;

        return [
            'id' => $p->id(),
            'parametro_sistema_id' => $p->parametroSistemaId(),
            'conjunto_id' => $p->conjuntoId(),
            'valor_param_conjunto' => $p->valorParamConjunto(),
        ];
    }
}
