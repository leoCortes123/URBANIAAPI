<?php

namespace App\Application\UnidadOcupante\DTOs;

final readonly class CreateUnidadOcupanteData
{
    public function __construct(
        public string $tipoOcupante,
        public ?bool $esTitular,
        public string $fechaInicio,
        public ?string $fechaFin,
        public ?bool $estadoOcupante,
        public ?string $observaciones,
        public int $unidadId,
        public int $userId,
        public int $conjuntoId,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            $validated['tipo_ocupante'],
            $validated['es_titular'] ?? null,
            $validated['fecha_inicio'],
            $validated['fecha_fin'] ?? null,
            $validated['estado_ocupante'] ?? null,
            $validated['observaciones'] ?? null,
            (int) $validated['unidad_id'],
            (int) $validated['user_id'],
            (int) $validated['conjunto_id'],
        );
    }
}
