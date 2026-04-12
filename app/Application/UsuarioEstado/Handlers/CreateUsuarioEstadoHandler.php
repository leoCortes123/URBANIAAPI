<?php

namespace App\Application\UsuarioEstado\Handlers;

use App\Application\UsuarioEstado\DTOs\CreateUsuarioEstadoData;
use App\Domain\UsuarioEstado\Entities\UsuarioEstado;
use App\Domain\UsuarioEstado\Repositories\UsuarioEstadoRepositoryInterface;

final class CreateUsuarioEstadoHandler
{
    public function __construct(
        private UsuarioEstadoRepositoryInterface $usuarioEstadoRepository,
    ) {
    }

    public function handle(CreateUsuarioEstadoData $data): UsuarioEstado
    {
        $usuarioEstado = new UsuarioEstado(
            null,
            $data->nombreUseresta,
            $data->codigoUseresta,
            $data->descripcionUseresta,
            $data->ordenUseresta,
            $data->estadoUseresta,
        );

        return $this->usuarioEstadoRepository->save($usuarioEstado);
    }
}
