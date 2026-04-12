<?php

namespace App\Domain\ConjuntoUsuario\ValueObjects;

use App\Domain\ConjuntoUsuario\Entities\ConjuntoUsuario;

final readonly class ConjuntosUsuariosPage
{
    /**
     * @param  list<ConjuntoUsuario>  $items
     */
    public function __construct(
        private array $items,
        private int $total,
        private int $perPage,
        private int $currentPage,
    ) {
    }

    /**
     * @return list<ConjuntoUsuario>
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
