<?php

namespace App\Domain\Municipio\Entities;

final class Municipio
{
    public function __construct(
        private ?int $id,
        private ?string $codigoDaneMunicipi,
        private string $nombreMunicipi,
        private ?bool $estadoMunicipi,
        private int $departamentoId,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function codigoDaneMunicipi(): ?string
    {
        return $this->codigoDaneMunicipi;
    }

    public function nombreMunicipi(): string
    {
        return $this->nombreMunicipi;
    }

    public function estadoMunicipi(): ?bool
    {
        return $this->estadoMunicipi;
    }

    public function departamentoId(): int
    {
        return $this->departamentoId;
    }
}
