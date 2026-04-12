<?php

namespace App\Application\Usuario\DTOs;

final readonly class CreateUsuarioData
{
    public function __construct(
        public string $name,
        public string $email,
        public string $plainPassword,
        public string $documento,
        public ?string $telefono,
        public ?string $fotoUrl,
        public ?bool $estado,
        public ?\DateTimeImmutable $ultimoAcceso,
        public int $tipoDocumentoId,
        public int $rolId,
        public int $usersEstadoId,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        $ultimo = null;
        if (! empty($validated['ultimo_acceso'])) {
            $ultimo = new \DateTimeImmutable((string) $validated['ultimo_acceso']);
        }

        return new self(
            $validated['name'],
            $validated['email'],
            $validated['password'],
            $validated['documento'],
            $validated['telefono'] ?? null,
            $validated['foto_url'] ?? null,
            $validated['estado'] ?? null,
            $ultimo,
            (int) $validated['tipo_documento_id'],
            (int) $validated['rol_id'],
            (int) $validated['users_estado_id'],
        );
    }
}
