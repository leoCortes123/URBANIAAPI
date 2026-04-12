<?php

namespace App\Application\Permiso\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Permiso\Entities\Permiso;
use App\Domain\Permiso\Repositories\PermisoRepositoryInterface;

final class GetPermisoByIdHandler
{
    public function __construct(
        private PermisoRepositoryInterface $permisoRepository,
    ) {
    }

    public function handle(int $id): Permiso
    {
        $row = $this->permisoRepository->findById($id);
        if ($row === null) {
            throw ResourceNotFoundException::permiso();
        }

        return $row;
    }
}
