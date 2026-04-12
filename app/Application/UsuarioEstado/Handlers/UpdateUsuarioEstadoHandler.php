<?php

namespace App\Application\UsuarioEstado\Handlers;

use App\Application\UsuarioEstado\DTOs\UpdateUsuarioEstadoData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\UsuarioEstado\Entities\UsuarioEstado;
use App\Domain\UsuarioEstado\Repositories\UsuarioEstadoRepositoryInterface;

final class UpdateUsuarioEstadoHandler
{
    public function __construct(
        private UsuarioEstadoRepositoryInterface $usuarioEstadoRepository,
    ) {
    }

    public function handle(int $id, UpdateUsuarioEstadoData $data): UsuarioEstado
    {
        if ($this->usuarioEstadoRepository->findById($id) === null) {
            throw ResourceNotFoundException::usuarioEstado();
        }

        $usuarioEstado = new UsuarioEstado(
            $id,
            $data->nombreUseresta,
            $data->codigoUseresta,
            $data->descripcionUseresta,
            $data->ordenUseresta,
            $data->estadoUseresta,
        );

        return $this->usuarioEstadoRepository->save($usuarioEstado);
    }
}
