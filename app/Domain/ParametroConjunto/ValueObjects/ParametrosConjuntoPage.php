<?php

namespace App\Domain\ParametroConjunto\ValueObjects;

use App\Domain\ParametroConjunto\Entities\ParametroConjunto;

final readonly class ParametrosConjuntoPage
{
    /**
     * @param  list<ParametroConjunto>  $items
     */
    public function __construct(
        private array $items,
        private int $total,
        private int $perPage,
        private int $currentPage,
    ) {
    }

    /**
     * @return list<ParametroConjunto>
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
