<?php

namespace App\Application\RolPermiso\Handlers;

use App\Application\RolPermiso\DTOs\UpdateRolPermisoData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\RolPermiso\Entities\RolPermiso;
use App\Domain\RolPermiso\Repositories\RolPermisoRepositoryInterface;

final class UpdateRolPermisoHandler
{
    public function __construct(
        private RolPermisoRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id, UpdateRolPermisoData $data): RolPermiso
    {
        if ($this->repository->findById($id) === null) {
            throw ResourceNotFoundException::rolPermiso();
        }

        $entity = new RolPermiso($id, $data->rolId, $data->permisoId);

        return $this->repository->save($entity);
    }
}
