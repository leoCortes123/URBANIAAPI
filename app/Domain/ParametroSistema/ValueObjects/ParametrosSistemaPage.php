<?php

namespace App\Domain\ParametroSistema\ValueObjects;

use App\Domain\ParametroSistema\Entities\ParametroSistema;

final readonly class ParametrosSistemaPage
{
    /**
     * @param  list<ParametroSistema>  $items
     */
    public function __construct(
        private array $items,
        private int $total,
        private int $perPage,
        private int $currentPage,
    ) {
    }

    /**
     * @return list<ParametroSistema>
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
