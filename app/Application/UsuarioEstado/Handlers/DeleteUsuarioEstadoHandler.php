<?php

namespace App\Application\UsuarioEstado\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\UsuarioEstado\Repositories\UsuarioEstadoRepositoryInterface;

final class DeleteUsuarioEstadoHandler
{
    public function __construct(
        private UsuarioEstadoRepositoryInterface $usuarioEstadoRepository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->usuarioEstadoRepository->findById($id) === null) {
            throw ResourceNotFoundException::usuarioEstado();
        }

        $this->usuarioEstadoRepository->delete($id);
    }
}
