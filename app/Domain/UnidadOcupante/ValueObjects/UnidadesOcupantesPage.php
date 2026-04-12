<?php

namespace App\Domain\UnidadOcupante\ValueObjects;

use App\Domain\UnidadOcupante\Entities\UnidadOcupante;

final readonly class UnidadesOcupantesPage
{
    /**
     * @param  list<UnidadOcupante>  $items
     */
    public function __construct(
        private array $items,
        private int $total,
        private int $perPage,
        private int $currentPage,
    ) {
    }

    /**
     * @return list<UnidadOcupante>
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
