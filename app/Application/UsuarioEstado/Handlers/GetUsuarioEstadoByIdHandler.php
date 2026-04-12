<?php

namespace App\Application\UsuarioEstado\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\UsuarioEstado\Entities\UsuarioEstado;
use App\Domain\UsuarioEstado\Repositories\UsuarioEstadoRepositoryInterface;

final class GetUsuarioEstadoByIdHandler
{
    public function __construct(
        private UsuarioEstadoRepositoryInterface $usuarioEstadoRepository,
    ) {
    }

    public function handle(int $id): UsuarioEstado
    {
        $usuarioEstado = $this->usuarioEstadoRepository->findById($id);
        if ($usuarioEstado === null) {
            throw ResourceNotFoundException::usuarioEstado();
        }

        return $usuarioEstado;
    }
}
