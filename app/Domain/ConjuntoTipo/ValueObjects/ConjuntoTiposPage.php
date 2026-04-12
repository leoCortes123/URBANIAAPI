<?php

namespace App\Domain\ConjuntoTipo\ValueObjects;

use App\Domain\ConjuntoTipo\Entities\ConjuntoTipo;

final readonly class ConjuntoTiposPage
{
    /**
     * @param  list<ConjuntoTipo>  $items
     */
    public function __construct(
        private array $items,
        private int $total,
        private int $perPage,
        private int $currentPage,
    ) {
    }

    /**
     * @return list<ConjuntoTipo>
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
