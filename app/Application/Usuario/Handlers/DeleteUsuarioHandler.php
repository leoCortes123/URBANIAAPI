<?php

namespace App\Application\Usuario\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Usuario\Repositories\UsuarioRepositoryInterface;

final class DeleteUsuarioHandler
{
    public function __construct(
        private UsuarioRepositoryInterface $usuarioRepository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->usuarioRepository->findById($id) === null) {
            throw ResourceNotFoundException::usuario();
        }

        $this->usuarioRepository->delete($id);
    }
}
