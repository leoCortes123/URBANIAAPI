<?php

namespace App\Application\ParametroSistema\DTOs;

final readonly class UpdateParametroSistemaData
{
    public function __construct(
        public string $codigoParamSist,
        public string $nombreParamSist,
        public ?string $valorParamSist,
        public string $tipoDatoParamSist,
        public ?string $descripcionParamSist,
        public ?bool $editableParamSist,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            $validated['codigo_param_sist'],
            $validated['nombre_param_sist'],
            $validated['valor_param_sist'] ?? null,
            $validated['tipo_dato_param_sist'] ?? 'string',
            $validated['descripcion_param_sist'] ?? null,
            $validated['editable_param_sist'] ?? null,
        );
    }
}
