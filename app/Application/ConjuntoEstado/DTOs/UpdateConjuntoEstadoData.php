<?php

namespace App\Application\ConjuntoEstado\DTOs;

final readonly class UpdateConjuntoEstadoData
{
    public function __construct(
        public string $nombreConjesta,
        public ?string $descripcionConjesta,
        public ?int $ordenConjesta,
        public ?bool $estadoConjesta,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            $validated['nombre_conjesta'],
            $validated['descripcion_conjesta'] ?? null,
            isset($validated['orden_conjesta']) ? (int) $validated['orden_conjesta'] : null,
            $validated['estado_conjesta'] ?? null,
        );
    }
}
