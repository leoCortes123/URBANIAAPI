<?php

namespace App\Application\Rol\Handlers;

use App\Application\Rol\DTOs\UpdateRolData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Rol\Entities\Rol;
use App\Domain\Rol\Repositories\RolRepositoryInterface;

final class UpdateRolHandler
{
    public function __construct(
        private RolRepositoryInterface $rolRepository,
    ) {
    }

    public function handle(int $id, UpdateRolData $data): Rol
    {
        if ($this->rolRepository->findById($id) === null) {
            throw ResourceNotFoundException::rol();
        }

        $rol = new Rol(
            $id,
            $data->nombreRol,
            $data->codigoRol,
            $data->descripcionRol,
            $data->nivelRol,
            $data->estadoRol,
        );

        return $this->rolRepository->save($rol);
    }
}
