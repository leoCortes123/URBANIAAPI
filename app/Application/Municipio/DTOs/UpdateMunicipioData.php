<?php

namespace App\Application\Municipio\DTOs;

final readonly class UpdateMunicipioData
{
    public function __construct(
        public ?string $codigoDaneMunicipi,
        public string $nombreMunicipi,
        public ?bool $estadoMunicipi,
        public int $departamentoId,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            $validated['codigo_dane_municipi'] ?? null,
            $validated['nombre_municipi'],
            $validated['estado_municipi'] ?? null,
            (int) $validated['departamento_id'],
        );
    }
}
