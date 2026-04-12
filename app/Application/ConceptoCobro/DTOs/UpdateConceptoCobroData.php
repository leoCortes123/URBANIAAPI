<?php

namespace App\Application\ConceptoCobro\DTOs;

final readonly class UpdateConceptoCobroData
{
    public function __construct(
        public int $categoriaConceptoId,
        public string $codigoConcepto,
        public string $nombreConcepto,
        public ?string $descripcionConcepto,
        public ?string $valorBaseConcepto,
        public ?string $periodicidadConcepto,
        public ?bool $activoConcepto,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            (int) $validated['categoria_concepto_id'],
            $validated['codigo_concepto'],
            $validated['nombre_concepto'],
            $validated['descripcion_concepto'] ?? null,
            isset($validated['valor_base_concepto']) ? (string) $validated['valor_base_concepto'] : null,
            $validated['periodicidad_concepto'] ?? null,
            $validated['activo_concepto'] ?? null,
        );
    }
}
