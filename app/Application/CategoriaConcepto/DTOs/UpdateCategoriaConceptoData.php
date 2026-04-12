<?php

namespace App\Application\CategoriaConcepto\DTOs;

final readonly class UpdateCategoriaConceptoData
{
    public function __construct(
        public string $nombreCatconc,
        public ?string $codigoCatconc,
        public ?string $descripcionCatconc,
        public ?int $ordenCatconc,
        public ?bool $estadoCatconc,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            $validated['nombre_catconc'],
            $validated['codigo_catconc'] ?? null,
            $validated['descripcion_catconc'] ?? null,
            isset($validated['orden_catconc']) ? (int) $validated['orden_catconc'] : null,
            $validated['estado_catconc'] ?? null,
        );
    }
}
