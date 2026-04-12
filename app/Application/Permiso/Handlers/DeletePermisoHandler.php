<?php

namespace App\Application\Permiso\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Permiso\Repositories\PermisoRepositoryInterface;

final class DeletePermisoHandler
{
    public function __construct(
        private PermisoRepositoryInterface $permisoRepository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->permisoRepository->findById($id) === null) {
            throw ResourceNotFoundException::permiso();
        }

        $this->permisoRepository->delete($id);
    }
}
