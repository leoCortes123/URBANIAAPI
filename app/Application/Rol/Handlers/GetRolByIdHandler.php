<?php

namespace App\Application\Rol\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Rol\Entities\Rol;
use App\Domain\Rol\Repositories\RolRepositoryInterface;

final class GetRolByIdHandler
{
    public function __construct(
        private RolRepositoryInterface $rolRepository,
    ) {
    }

    public function handle(int $id): Rol
    {
        $rol = $this->rolRepository->findById($id);
        if ($rol === null) {
            throw ResourceNotFoundException::rol();
        }

        return $rol;
    }
}
