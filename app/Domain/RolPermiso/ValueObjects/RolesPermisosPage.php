<?php

namespace App\Domain\RolPermiso\ValueObjects;

use App\Domain\RolPermiso\Entities\RolPermiso;

final readonly class RolesPermisosPage
{
    /**
     * @param  list<RolPermiso>  $items
     */
    public function __construct(
        private array $items,
        private int $total,
        private int $perPage,
        private int $currentPage,
    ) {
    }

    /**
     * @return list<RolPermiso>
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
