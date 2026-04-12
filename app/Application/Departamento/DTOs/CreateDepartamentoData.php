<?php

namespace App\Application\Departamento\DTOs;

final readonly class CreateDepartamentoData
{
    public function __construct(
        public ?string $codigoDaneDepartam,
        public string $nombreDepartam,
        public ?bool $estadoDepartam,
        public int $paisId,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            $validated['codigo_dane_departam'] ?? null,
            $validated['nombre_departam'],
            $validated['estado_departam'] ?? null,
            (int) $validated['pais_id'],
        );
    }
}
