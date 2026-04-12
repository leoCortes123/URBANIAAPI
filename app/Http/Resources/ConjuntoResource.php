<?php

namespace App\Http\Resources;

use App\Domain\Conjunto\Entities\Conjunto;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin Conjunto
 */
class ConjuntoResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var Conjunto $c */
        $c = $this->resource;

        return [
            'id' => $c->id(),
            'nombre_conjunto' => $c->nombreConjunto(),
            'nit_conjunto' => $c->nitConjunto(),
            'direccion_conjunto' => $c->direccionConjunto(),
            'telefono_conjunto' => $c->telefonoConjunto(),
            'estrato_conjunto' => $c->estratoConjunto(),
            'coeficiente_total_conjunto' => $c->coeficienteTotalConjunto(),
            'datos_bancarios_conjunto' => $c->datosBancariosConjunto(),
            'reglamento_url_conjunto' => $c->reglamentoUrlConjunto(),
            'logo_url_conjunto' => $c->logoUrlConjunto(),
            'portada_url_conjunto' => $c->portadaUrlConjunto(),
            'galeria_conjunto' => $c->galeriaConjunto(),
            'estado_conjunto' => $c->estadoConjunto(),
            'conjunto_tipo_id' => $c->conjuntoTipoId(),
            'conjunto_estado_id' => $c->conjuntoEstadoId(),
            'municipio_id' => $c->municipioId(),
        ];
    }
}
