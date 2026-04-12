<?php

namespace App\Domain\ConjuntoTipo\Entities;

final class ConjuntoTipo
{
    public function __construct(
        private ?int $id,
        private string $nombreTipoconj,
        private ?string $descripcionTipoconj,
        private ?bool $estadoConest,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function nombreTipoconj(): string
    {
        return $this->nombreTipoconj;
    }

    public function descripcionTipoconj(): ?string
    {
        return $this->descripcionTipoconj;
    }

    public function estadoConest(): ?bool
    {
        return $this->estadoConest;
    }
}
