<?php

namespace App\Domain\UnidadEstado\Entities;

final class UnidadEstado
{
    public function __construct(
        private ?int $id,
        private string $nombreUnidesta,
        private ?string $codigoUnidesta,
        private ?string $descripcionUnidesta,
        private ?bool $estadoUnidesta,
        private ?int $ordenUnidesta,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function nombreUnidesta(): string
    {
        return $this->nombreUnidesta;
    }

    public function codigoUnidesta(): ?string
    {
        return $this->codigoUnidesta;
    }

    public function descripcionUnidesta(): ?string
    {
        return $this->descripcionUnidesta;
    }

    public function estadoUnidesta(): ?bool
    {
        return $this->estadoUnidesta;
    }

    public function ordenUnidesta(): ?int
    {
        return $this->ordenUnidesta;
    }
}
