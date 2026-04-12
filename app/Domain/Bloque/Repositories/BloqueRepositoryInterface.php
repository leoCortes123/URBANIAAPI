<?php

namespace App\Domain\Bloque\Repositories;

use App\Domain\Bloque\Entities\Bloque;
use App\Domain\Bloque\ValueObjects\BloquesPage;

interface BloqueRepositoryInterface
{
    public function findById(int $id): ?Bloque;

    public function paginate(int $perPage = 15, int $page = 1): BloquesPage;

    public function save(Bloque $bloque): Bloque;

    public function delete(int $id): bool;
}
