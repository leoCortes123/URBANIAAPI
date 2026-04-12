<?php

namespace App\Domain\UsuarioTipoDocumento\ValueObjects;

use App\Domain\UsuarioTipoDocumento\Entities\UsuarioTipoDocumento;

final readonly class UsuarioTipoDocumentosPage
{
    /**
     * @param  list<UsuarioTipoDocumento>  $items
     */
    public function __construct(
        private array $items,
        private int $total,
        private int $perPage,
        private int $currentPage,
    ) {
    }

    /**
     * @return list<UsuarioTipoDocumento>
     */
    public function items(): array
    {
        return $this->items;
    }

    public function total(): int
    {
        return $this->total;
    }

    public function perPage(): int
    {
        return $this->perPage;
    }

    public function currentPage(): int
    {
        return $this->currentPage;
    }
}
