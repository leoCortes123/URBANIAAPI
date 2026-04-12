<?php

namespace App\Domain\Permiso\Repositories;

use App\Domain\Permiso\Entities\Permiso;
use App\Domain\Permiso\ValueObjects\PermisosPage;

interface PermisoRepositoryInterface
{
    public function findById(int $id): ?Permiso;

    public function paginate(int $perPage = 15, int $page = 1): PermisosPage;

    public function save(Permiso $permiso): Permiso;

    public function delete(int $id): bool;
}
