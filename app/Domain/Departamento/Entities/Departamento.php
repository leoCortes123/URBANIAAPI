<?php

namespace App\Domain\Departamento\Entities;

final class Departamento
{
    public function __construct(
        private ?int $id,
        private ?string $codigoDaneDepartam,
        private string $nombreDepartam,
        private ?bool $estadoDepartam,
        private int $paisId,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function codigoDaneDepartam(): ?string
    {
        return $this->codigoDaneDepartam;
    }

    public function nombreDepartam(): string
    {
        return $this->nombreDepartam;
    }

    public function estadoDepartam(): ?bool
    {
        return $this->estadoDepartam;
    }

    public function paisId(): int
    {
        return $this->paisId;
    }
}
