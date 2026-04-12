<?php

namespace App\Application\Rol\DTOs;

final readonly class UpdateRolData
{
    public function __construct(
        public string $nombreRol,
        public string $codigoRol,
        public ?string $descripcionRol,
        public ?int $nivelRol,
        public ?bool $estadoRol,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            $validated['nombre_rol'],
            $validated['codigo_rol'],
            $validated['descripcion_rol'] ?? null,
            isset($validated['nivel_rol']) ? (int) $validated['nivel_rol'] : null,
            $validated['estado_rol'] ?? null,
        );
    }
}
