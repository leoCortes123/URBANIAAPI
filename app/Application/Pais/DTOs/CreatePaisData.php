<?php

namespace App\Application\Pais\DTOs;

final readonly class CreatePaisData
{
    public function __construct(
        public ?string $codigoPais,
        public string $nombrePais,
        public ?string $codigoIsoPais,
        public ?bool $estadoPais,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            $validated['codigo_pais'] ?? null,
            $validated['nombre_pais'],
            $validated['codigo_iso_pais'] ?? null,
            $validated['estado_pais'] ?? null,
        );
    }
}
