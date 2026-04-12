<?php

namespace App\Domain\Bloque\Entities;

final class Bloque
{
    public function __construct(
        private ?int $id,
        private string $nombreBloque,
        private ?string $descripcionBloque,
        private ?int $numeroUnidadesBloque,
        private ?int $ordenBloque,
        private ?bool $estadoBloque,
        private int $conjuntoId,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function nombreBloque(): string
    {
        return $this->nombreBloque;
    }

    public function descripcionBloque(): ?string
    {
        return $this->descripcionBloque;
    }

    public function numeroUnidadesBloque(): ?int
    {
        return $this->numeroUnidadesBloque;
    }

    public function ordenBloque(): ?int
    {
        return $this->ordenBloque;
    }

    public function estadoBloque(): ?bool
    {
        return $this->estadoBloque;
    }

    public function conjuntoId(): int
    {
        return $this->conjuntoId;
    }
}
