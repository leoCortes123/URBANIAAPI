<?php

namespace App\Application\RolPermiso\Handlers;

use App\Application\RolPermiso\DTOs\ListRolesPermisosData;
use App\Domain\RolPermiso\Repositories\RolPermisoRepositoryInterface;
use App\Domain\RolPermiso\ValueObjects\RolesPermisosPage;

final class ListRolesPermisosHandler
{
    public function __construct(
        private RolPermisoRepositoryInterface $repository,
    ) {
    }

    public function handle(ListRolesPermisosData $data): RolesPermisosPage
    {
        return $this->repository->paginate($data->perPage, $data->page);
    }
}
