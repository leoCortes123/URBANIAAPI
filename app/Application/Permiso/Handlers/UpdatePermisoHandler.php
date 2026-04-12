<?php

namespace App\Application\Permiso\Handlers;

use App\Application\Permiso\DTOs\UpdatePermisoData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Permiso\Entities\Permiso;
use App\Domain\Permiso\Repositories\PermisoRepositoryInterface;

final class UpdatePermisoHandler
{
    public function __construct(
        private PermisoRepositoryInterface $permisoRepository,
    ) {
    }

    public function handle(int $id, UpdatePermisoData $data): Permiso
    {
        if ($this->permisoRepository->findById($id) === null) {
            throw ResourceNotFoundException::permiso();
        }

        $entity = new Permiso(
            $id,
            $data->codigoPermiso,
            $data->nombrePermiso,
            $data->moduloPermiso,
            $data->descripcionPermiso,
        );

        return $this->permisoRepository->save($entity);
    }
}
