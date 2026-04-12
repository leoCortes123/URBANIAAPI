<?php

namespace App\Domain\CategoriaConcepto\ValueObjects;

use App\Domain\CategoriaConcepto\Entities\CategoriaConcepto;

final readonly class CategoriaConceptosPage
{
    /**
     * @param  list<CategoriaConcepto>  $items
     */
    public function __construct(
        private array $items,
        private int $total,
        private int $perPage,
        private int $currentPage,
    ) {
    }

    /**
     * @return list<CategoriaConcepto>
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
