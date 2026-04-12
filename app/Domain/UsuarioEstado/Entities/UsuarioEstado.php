<?php

namespace App\Domain\UsuarioEstado\Entities;

final class UsuarioEstado
{
    public function __construct(
        private ?int $id,
        private string $nombreUseresta,
        private ?string $codigoUseresta,
        private ?string $descripcionUseresta,
        private ?int $ordenUseresta,
        private ?bool $estadoUseresta,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function nombreUseresta(): string
    {
        return $this->nombreUseresta;
    }

    public function codigoUseresta(): ?string
    {
        return $this->codigoUseresta;
    }

    public function descripcionUseresta(): ?string
    {
        return $this->descripcionUseresta;
    }

    public function ordenUseresta(): ?int
    {
        return $this->ordenUseresta;
    }

    public function estadoUseresta(): ?bool
    {
        return $this->estadoUseresta;
    }
}
