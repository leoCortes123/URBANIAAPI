<?php

namespace App\Domain\RolPermiso\Repositories;

use App\Domain\RolPermiso\Entities\RolPermiso;
use App\Domain\RolPermiso\ValueObjects\RolesPermisosPage;

interface RolPermisoRepositoryInterface
{
    public function findById(int $id): ?RolPermiso;

    public function paginate(int $perPage = 15, int $page = 1): RolesPermisosPage;

    public function save(RolPermiso $rolPermiso): RolPermiso;

    public function delete(int $id): bool;
}
