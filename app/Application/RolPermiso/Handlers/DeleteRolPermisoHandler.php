<?php

namespace App\Application\RolPermiso\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\RolPermiso\Repositories\RolPermisoRepositoryInterface;

final class DeleteRolPermisoHandler
{
    public function __construct(
        private RolPermisoRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->repository->findById($id) === null) {
            throw ResourceNotFoundException::rolPermiso();
        }

        $this->repository->delete($id);
    }
}
