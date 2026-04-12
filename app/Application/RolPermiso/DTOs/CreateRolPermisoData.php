<?php

namespace App\Application\RolPermiso\DTOs;

final readonly class CreateRolPermisoData
{
    public function __construct(
        public int $rolId,
        public int $permisoId,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            (int) $validated['rol_id'],
            (int) $validated['permiso_id'],
        );
    }
}
