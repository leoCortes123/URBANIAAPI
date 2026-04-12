<?php

namespace App\Domain\Municipio\ValueObjects;

use App\Domain\Municipio\Entities\Municipio;

final readonly class MunicipiosPage
{
    /**
     * @param  list<Municipio>  $items
     */
    public function __construct(
        private array $items,
        private int $total,
        private int $perPage,
        private int $currentPage,
    ) {
    }

    /**
     * @return list<Municipio>
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
