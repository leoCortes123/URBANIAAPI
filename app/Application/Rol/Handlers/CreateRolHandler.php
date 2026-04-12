<?php

namespace App\Application\Rol\Handlers;

use App\Application\Rol\DTOs\CreateRolData;
use App\Domain\Rol\Entities\Rol;
use App\Domain\Rol\Repositories\RolRepositoryInterface;

final class CreateRolHandler
{
    public function __construct(
        private RolRepositoryInterface $rolRepository,
    ) {
    }

    public function handle(CreateRolData $data): Rol
    {
        $rol = new Rol(
            null,
            $data->nombreRol,
            $data->codigoRol,
            $data->descripcionRol,
            $data->nivelRol,
            $data->estadoRol,
        );

        return $this->rolRepository->save($rol);
    }
}
