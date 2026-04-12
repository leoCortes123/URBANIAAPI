<?php

namespace App\Domain\Rol\Repositories;

use App\Domain\Rol\Entities\Rol;
use App\Domain\Rol\ValueObjects\RolesPage;

interface RolRepositoryInterface
{
    public function findById(int $id): ?Rol;

    public function paginate(int $perPage = 15, int $page = 1): RolesPage;

    public function save(Rol $rol): Rol;

    public function delete(int $id): bool;
}
