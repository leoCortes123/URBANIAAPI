<?php

namespace App\Domain\ConjuntoEstado\ValueObjects;

use App\Domain\ConjuntoEstado\Entities\ConjuntoEstado;

final readonly class ConjuntoEstadosPage
{
    /**
     * @param  list<ConjuntoEstado>  $items
     */
    public function __construct(
        private array $items,
        private int $total,
        private int $perPage,
        private int $currentPage,
    ) {
    }

    /**
     * @return list<ConjuntoEstado>
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
