<?php

namespace App\Domain\UnidadEstado\ValueObjects;

use App\Domain\UnidadEstado\Entities\UnidadEstado;

final readonly class UnidadEstadosPage
{
    /**
     * @param  list<UnidadEstado>  $items
     */
    public function __construct(
        private array $items,
        private int $total,
        private int $perPage,
        private int $currentPage,
    ) {
    }

    /**
     * @return list<UnidadEstado>
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
