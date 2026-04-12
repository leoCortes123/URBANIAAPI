<?php

namespace App\Domain\Pais\Entities;

final class Pais
{
    public function __construct(
        private ?int $id,
        private ?string $codigoPais,
        private string $nombrePais,
        private ?string $codigoIsoPais,
        private ?bool $estadoPais,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function codigoPais(): ?string
    {
        return $this->codigoPais;
    }

    public function nombrePais(): string
    {
        return $this->nombrePais;
    }

    public function codigoIsoPais(): ?string
    {
        return $this->codigoIsoPais;
    }

    public function estadoPais(): ?bool
    {
        return $this->estadoPais;
    }
}
