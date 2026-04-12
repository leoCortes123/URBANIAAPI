<?php

namespace App\Application\Permiso\DTOs;

final readonly class CreatePermisoData
{
    public function __construct(
        public ?string $codigoPermiso,
        public string $nombrePermiso,
        public string $moduloPermiso,
        public ?string $descripcionPermiso,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            $validated['codigo_permiso'] ?? null,
            $validated['nombre_permiso'],
            $validated['modulo_permiso'],
            $validated['descripcion_permiso'] ?? null,
        );
    }
}
