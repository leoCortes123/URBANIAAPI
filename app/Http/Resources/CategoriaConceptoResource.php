<?php

namespace App\Http\Resources;

use App\Domain\CategoriaConcepto\Entities\CategoriaConcepto;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @mixin CategoriaConcepto
 */
class CategoriaConceptoResource extends JsonResource
{
    /**
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        /** @var CategoriaConcepto $categoriaConcepto */
        $categoriaConcepto = $this->resource;

        return [
            'id' => $categoriaConcepto->id(),
            'nombre_catconc' => $categoriaConcepto->nombreCatconc(),
            'codigo_catconc' => $categoriaConcepto->codigoCatconc(),
            'descripcion_catconc' => $categoriaConcepto->descripcionCatconc(),
            'orden_catconc' => $categoriaConcepto->ordenCatconc(),
            'estado_catconc' => $categoriaConcepto->estadoCatconc(),
        ];
    }
}
