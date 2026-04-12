<?php

namespace App\Domain\Rol\Entities;

final class Rol
{
    public function __construct(
        private ?int $id,
        private string $nombreRol,
        private string $codigoRol,
        private ?string $descripcionRol,
        private ?int $nivelRol,
        private ?bool $estadoRol,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function nombreRol(): string
    {
        return $this->nombreRol;
    }

    public function codigoRol(): string
    {
        return $this->codigoRol;
    }

    public function descripcionRol(): ?string
    {
        return $this->descripcionRol;
    }

    public function nivelRol(): ?int
    {
        return $this->nivelRol;
    }

    public function estadoRol(): ?bool
    {
        return $this->estadoRol;
    }
}
