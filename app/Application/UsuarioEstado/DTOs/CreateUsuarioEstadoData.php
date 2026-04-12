<?php

namespace App\Application\UsuarioEstado\DTOs;

final readonly class CreateUsuarioEstadoData
{
    public function __construct(
        public string $nombreUseresta,
        public ?string $codigoUseresta,
        public ?string $descripcionUseresta,
        public ?int $ordenUseresta,
        public ?bool $estadoUseresta,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            $validated['nombre_useresta'],
            $validated['codigo_useresta'] ?? null,
            $validated['descripcion_useresta'] ?? null,
            isset($validated['orden_useresta']) ? (int) $validated['orden_useresta'] : null,
            $validated['estado_useresta'] ?? null,
        );
    }
}
