<?php

namespace App\Domain\ConceptoCobro\ValueObjects;

use App\Domain\ConceptoCobro\Entities\ConceptoCobro;

final readonly class ConceptosCobroPage
{
    /**
     * @param  list<ConceptoCobro>  $items
     */
    public function __construct(
        private array $items,
        private int $total,
        private int $perPage,
        private int $currentPage,
    ) {
    }

    /**
     * @return list<ConceptoCobro>
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
