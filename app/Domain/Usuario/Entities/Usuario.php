<?php

namespace App\Domain\Usuario\Entities;

final class Usuario
{
    public function __construct(
        private ?int $id,
        private string $name,
        private string $email,
        private string $documento,
        private ?string $telefono,
        private ?string $fotoUrl,
        private ?bool $estado,
        private ?\DateTimeImmutable $ultimoAcceso,
        private ?int $tipoDocumentoId,
        private ?int $rolId,
        private ?int $usersEstadoId,
        private ?string $passwordHash,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function email(): string
    {
        return $this->email;
    }

    public function documento(): string
    {
        return $this->documento;
    }

    public function telefono(): ?string
    {
        return $this->telefono;
    }

    public function fotoUrl(): ?string
    {
        return $this->fotoUrl;
    }

    public function estado(): ?bool
    {
        return $this->estado;
    }

    public function ultimoAcceso(): ?\DateTimeImmutable
    {
        return $this->ultimoAcceso;
    }

    public function tipoDocumentoId(): ?int
    {
        return $this->tipoDocumentoId;
    }

    public function rolId(): ?int
    {
        return $this->rolId;
    }

    public function usersEstadoId(): ?int
    {
        return $this->usersEstadoId;
    }

    public function passwordHash(): ?string
    {
        return $this->passwordHash;
    }
}
