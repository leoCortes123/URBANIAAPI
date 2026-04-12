<?php

namespace App\Domain\Conjunto\Repositories;

use App\Domain\Conjunto\Entities\Conjunto;
use App\Domain\Conjunto\ValueObjects\ConjuntosPage;

interface ConjuntoRepositoryInterface
{
    public function findById(int $id): ?Conjunto;

    public function paginate(int $perPage = 15, int $page = 1): ConjuntosPage;

    public function save(Conjunto $conjunto): Conjunto;

    public function delete(int $id): bool;
}
