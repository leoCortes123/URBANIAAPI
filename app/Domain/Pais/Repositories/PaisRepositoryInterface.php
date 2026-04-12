<?php

namespace App\Domain\Pais\Repositories;

use App\Domain\Pais\Entities\Pais;
use App\Domain\Pais\ValueObjects\PaisesPage;

interface PaisRepositoryInterface
{
    public function findById(int $id): ?Pais;

    public function paginate(int $perPage = 15, int $page = 1): PaisesPage;

    public function save(Pais $pais): Pais;

    public function delete(int $id): bool;
}
