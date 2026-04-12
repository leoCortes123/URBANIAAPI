<?php

namespace App\Application\Bloque\DTOs;

final readonly class UpdateBloqueData
{
    public function __construct(
        public string $nombreBloque,
        public ?string $descripcionBloque,
        public ?int $numeroUnidadesBloque,
        public ?int $ordenBloque,
        public ?bool $estadoBloque,
        public int $conjuntoId,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            $validated['nombre_bloque'],
            $validated['descripcion_bloque'] ?? null,
            isset($validated['numero_unidades_bloque']) ? (int) $validated['numero_unidades_bloque'] : null,
            isset($validated['orden_bloque']) ? (int) $validated['orden_bloque'] : null,
            $validated['estado_bloque'] ?? null,
            (int) $validated['conjunto_id'],
        );
    }
}
