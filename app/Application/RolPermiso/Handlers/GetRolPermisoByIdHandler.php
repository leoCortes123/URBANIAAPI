<?php

namespace App\Application\RolPermiso\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\RolPermiso\Entities\RolPermiso;
use App\Domain\RolPermiso\Repositories\RolPermisoRepositoryInterface;

final class GetRolPermisoByIdHandler
{
    public function __construct(
        private RolPermisoRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id): RolPermiso
    {
        $row = $this->repository->findById($id);
        if ($row === null) {
            throw ResourceNotFoundException::rolPermiso();
        }

        return $row;
    }
}
