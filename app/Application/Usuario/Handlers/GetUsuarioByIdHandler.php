<?php

namespace App\Application\Usuario\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Usuario\Entities\Usuario;
use App\Domain\Usuario\Repositories\UsuarioRepositoryInterface;

final class GetUsuarioByIdHandler
{
    public function __construct(
        private UsuarioRepositoryInterface $usuarioRepository,
    ) {
    }

    public function handle(int $id): Usuario
    {
        $row = $this->usuarioRepository->findById($id);
        if ($row === null) {
            throw ResourceNotFoundException::usuario();
        }

        return $row;
    }
}
