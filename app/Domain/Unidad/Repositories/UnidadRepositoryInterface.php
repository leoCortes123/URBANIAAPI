<?php

namespace App\Domain\Unidad\Repositories;

use App\Domain\Unidad\Entities\Unidad;
use App\Domain\Unidad\ValueObjects\UnidadesPage;

interface UnidadRepositoryInterface
{
    public function findById(int $id): ?Unidad;

    public function paginate(int $perPage = 15, int $page = 1): UnidadesPage;

    public function save(Unidad $unidad): Unidad;

    public function delete(int $id): bool;
}
