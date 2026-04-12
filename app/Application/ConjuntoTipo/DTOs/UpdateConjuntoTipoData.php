<?php

namespace App\Application\ConjuntoTipo\DTOs;

final readonly class UpdateConjuntoTipoData
{
    public function __construct(
        public string $nombreTipoconj,
        public ?string $descripcionTipoconj,
        public ?bool $estadoConest,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            $validated['nombre_tipoconj'],
            $validated['descripcion_tipoconj'] ?? null,
            $validated['estado_conest'] ?? null,
        );
    }
}
