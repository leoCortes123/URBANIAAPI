<?php

namespace App\Application\ParametroConjunto\DTOs;

final readonly class UpdateParametroConjuntoData
{
    public function __construct(
        public int $parametroSistemaId,
        public int $conjuntoId,
        public ?string $valorParamConjunto,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            (int) $validated['parametro_sistema_id'],
            (int) $validated['conjunto_id'],
            $validated['valor_param_conjunto'] ?? null,
        );
    }
}
