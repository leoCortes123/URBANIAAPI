<?php

namespace App\Application\ConjuntoUsuario\DTOs;

final readonly class UpdateConjuntoUsuarioData
{
    public function __construct(
        public int $userId,
        public int $conjuntoId,
        public ?string $fechaVinculacion,
        public ?bool $estadoConjuser,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            (int) $validated['user_id'],
            (int) $validated['conjunto_id'],
            $validated['fecha_vinculacion'] ?? null,
            $validated['estado_conjuser'] ?? null,
        );
    }
}
