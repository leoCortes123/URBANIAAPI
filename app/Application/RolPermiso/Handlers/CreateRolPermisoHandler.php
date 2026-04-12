<?php

namespace App\Application\RolPermiso\Handlers;

use App\Application\RolPermiso\DTOs\CreateRolPermisoData;
use App\Domain\RolPermiso\Entities\RolPermiso;
use App\Domain\RolPermiso\Repositories\RolPermisoRepositoryInterface;

final class CreateRolPermisoHandler
{
    public function __construct(
        private RolPermisoRepositoryInterface $repository,
    ) {
    }

    public function handle(CreateRolPermisoData $data): RolPermiso
    {
        $entity = new RolPermiso(null, $data->rolId, $data->permisoId);

        return $this->repository->save($entity);
    }
}
