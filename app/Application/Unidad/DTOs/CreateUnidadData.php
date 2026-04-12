<?php

namespace App\Application\Unidad\DTOs;

final readonly class CreateUnidadData
{
    public function __construct(
        public string $numeroUnidad,
        public ?string $codigoUnidad,
        public ?int $pisoUnidad,
        public ?float $areaM2Unidad,
        public ?float $coeficienteUnidad,
        public ?bool $estadoUnidad,
        public int $bloqueId,
        public int $conjuntoId,
        public int $estadoOcupacionId,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            $validated['numero_unidad'],
            $validated['codigo_unidad'] ?? null,
            isset($validated['piso_unidad']) ? (int) $validated['piso_unidad'] : null,
            isset($validated['area_m2_unidad']) ? (float) $validated['area_m2_unidad'] : null,
            isset($validated['coeficiente_unidad']) ? (float) $validated['coeficiente_unidad'] : null,
            $validated['estado_unidad'] ?? null,
            (int) $validated['bloque_id'],
            (int) $validated['conjunto_id'],
            (int) $validated['estado_ocupacion_id'],
        );
    }
}
