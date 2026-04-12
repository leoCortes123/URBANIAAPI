<?php

namespace App\Domain\RolPermiso\Entities;

final class RolPermiso
{
    public function __construct(
        private ?int $id,
        private int $rolId,
        private int $permisoId,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function rolId(): int
    {
        return $this->rolId;
    }

    public function permisoId(): int
    {
        return $this->permisoId;
    }
}
