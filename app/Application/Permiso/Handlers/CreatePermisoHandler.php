<?php

namespace App\Application\Permiso\Handlers;

use App\Application\Permiso\DTOs\CreatePermisoData;
use App\Domain\Permiso\Entities\Permiso;
use App\Domain\Permiso\Repositories\PermisoRepositoryInterface;

final class CreatePermisoHandler
{
    public function __construct(
        private PermisoRepositoryInterface $permisoRepository,
    ) {
    }

    public function handle(CreatePermisoData $data): Permiso
    {
        $entity = new Permiso(
            null,
            $data->codigoPermiso,
            $data->nombrePermiso,
            $data->moduloPermiso,
            $data->descripcionPermiso,
        );

        return $this->permisoRepository->save($entity);
    }
}
