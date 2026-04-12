<?php

namespace App\Domain\ConjuntoEstado\Entities;

final class ConjuntoEstado
{
    public function __construct(
        private ?int $id,
        private string $nombreConjesta,
        private ?string $descripcionConjesta,
        private ?int $ordenConjesta,
        private ?bool $estadoConjesta,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function nombreConjesta(): string
    {
        return $this->nombreConjesta;
    }

    public function descripcionConjesta(): ?string
    {
        return $this->descripcionConjesta;
    }

    public function ordenConjesta(): ?int
    {
        return $this->ordenConjesta;
    }

    public function estadoConjesta(): ?bool
    {
        return $this->estadoConjesta;
    }
}
