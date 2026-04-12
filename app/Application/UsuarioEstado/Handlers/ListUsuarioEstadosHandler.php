<?php

namespace App\Application\UsuarioEstado\Handlers;

use App\Application\UsuarioEstado\DTOs\ListUsuarioEstadosData;
use App\Domain\UsuarioEstado\Repositories\UsuarioEstadoRepositoryInterface;
use App\Domain\UsuarioEstado\ValueObjects\UsuarioEstadosPage;

final class ListUsuarioEstadosHandler
{
    public function __construct(
        private UsuarioEstadoRepositoryInterface $usuarioEstadoRepository,
    ) {
    }

    public function handle(ListUsuarioEstadosData $data): UsuarioEstadosPage
    {
        return $this->usuarioEstadoRepository->paginate($data->perPage, $data->page);
    }
}
