<?php

namespace App\Application\UsuarioTipoDocumento\DTOs;

final readonly class ListUsuarioTipoDocumentosData
{
    public function __construct(
        public int $perPage,
        public int $page,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        $perPage = (int) ($validated['per_page'] ?? 15);
        if ($perPage < 1) {
            $perPage = 15;
        }
        if ($perPage > 100) {
            $perPage = 100;
        }

        $page = (int) ($validated['page'] ?? 1);
        if ($page < 1) {
            $page = 1;
        }

        return new self($perPage, $page);
    }
}
