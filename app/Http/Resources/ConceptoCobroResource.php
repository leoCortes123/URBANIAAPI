<?php

namespace App\Http\Resources;

use App\Domain\ConceptoCobro\Entities\ConceptoCobro;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin ConceptoCobro
 */
class ConceptoCobroResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var ConceptoCobro $c */
        $c = $this->resource;

        return [
            'id' => $c->id(),
            'categoria_concepto_id' => $c->categoriaConceptoId(),
            'codigo_concepto' => $c->codigoConcepto(),
            'nombre_concepto' => $c->nombreConcepto(),
            'descripcion_concepto' => $c->descripcionConcepto(),
            'valor_base_concepto' => $c->valorBaseConcepto(),
            'periodicidad_concepto' => $c->periodicidadConcepto(),
            'activo_concepto' => $c->activoConcepto(),
        ];
    }
}
