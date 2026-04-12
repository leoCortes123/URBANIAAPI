<?php

namespace App\Domain\Permiso\Entities;

final class Permiso
{
    public function __construct(
        private ?int $id,
        private ?string $codigoPermiso,
        private string $nombrePermiso,
        private string $moduloPermiso,
        private ?string $descripcionPermiso,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function codigoPermiso(): ?string
    {
        return $this->codigoPermiso;
    }

    public function nombrePermiso(): string
    {
        return $this->nombrePermiso;
    }

    public function moduloPermiso(): string
    {
        return $this->moduloPermiso;
    }

    public function descripcionPermiso(): ?string
    {
        return $this->descripcionPermiso;
    }
}
