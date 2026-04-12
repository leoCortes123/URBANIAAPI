<?php

namespace App\Domain\ConjuntoUsuario\Entities;

final class ConjuntoUsuario
{
    public function __construct(
        private ?int $id,
        private int $userId,
        private int $conjuntoId,
        private ?string $fechaVinculacion,
        private ?bool $estadoConjuser,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function userId(): int
    {
        return $this->userId;
    }

    public function conjuntoId(): int
    {
        return $this->conjuntoId;
    }

    public function fechaVinculacion(): ?string
    {
        return $this->fechaVinculacion;
    }

    public function estadoConjuser(): ?bool
    {
        return $this->estadoConjuser;
    }
}
