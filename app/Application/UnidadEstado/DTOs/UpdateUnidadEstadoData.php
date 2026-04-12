<?php

namespace App\Application\UnidadEstado\DTOs;

final readonly class UpdateUnidadEstadoData
{
    public function __construct(
        public string $nombreUnidesta,
        public ?string $codigoUnidesta,
        public ?string $descripcionUnidesta,
        public ?bool $estadoUnidesta,
        public ?int $ordenUnidesta,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            $validated['nombre_unidesta'],
            $validated['codigo_unidesta'] ?? null,
            $validated['descripcion_unidesta'] ?? null,
            $validated['estado_unidesta'] ?? null,
            isset($validated['orden_unidesta']) ? (int) $validated['orden_unidesta'] : null,
        );
    }
}
