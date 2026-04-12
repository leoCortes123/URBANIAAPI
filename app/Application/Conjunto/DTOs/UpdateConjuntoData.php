<?php

namespace App\Application\Conjunto\DTOs;

final readonly class UpdateConjuntoData
{
    public function __construct(
        public string $nombreConjunto,
        public string $nitConjunto,
        public ?string $direccionConjunto,
        public ?string $telefonoConjunto,
        public ?int $estratoConjunto,
        public ?float $coeficienteTotalConjunto,
        public ?string $datosBancariosConjunto,
        public ?string $reglamentoUrlConjunto,
        public ?string $logoUrlConjunto,
        public ?string $portadaUrlConjunto,
        public ?string $galeriaConjunto,
        public ?bool $estadoConjunto,
        public int $conjuntoTipoId,
        public int $conjuntoEstadoId,
        public int $municipioId,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            $validated['nombre_conjunto'],
            $validated['nit_conjunto'],
            $validated['direccion_conjunto'] ?? null,
            $validated['telefono_conjunto'] ?? null,
            isset($validated['estrato_conjunto']) ? (int) $validated['estrato_conjunto'] : null,
            isset($validated['coeficiente_total_conjunto']) ? (float) $validated['coeficiente_total_conjunto'] : null,
            $validated['datos_bancarios_conjunto'] ?? null,
            $validated['reglamento_url_conjunto'] ?? null,
            $validated['logo_url_conjunto'] ?? null,
            $validated['portada_url_conjunto'] ?? null,
            $validated['galeria_conjunto'] ?? null,
            $validated['estado_conjunto'] ?? null,
            (int) $validated['conjunto_tipo_id'],
            (int) $validated['conjunto_estado_id'],
            (int) $validated['municipio_id'],
        );
    }
}
