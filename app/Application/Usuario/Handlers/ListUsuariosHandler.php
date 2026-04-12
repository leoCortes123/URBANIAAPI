<?php

namespace App\Application\Usuario\Handlers;

use App\Application\Usuario\DTOs\ListUsuariosData;
use App\Domain\Usuario\Repositories\UsuarioRepositoryInterface;
use App\Domain\Usuario\ValueObjects\UsuariosPage;

final class ListUsuariosHandler
{
    public function __construct(
        private UsuarioRepositoryInterface $usuarioRepository,
    ) {
    }

    public function handle(ListUsuariosData $data): UsuariosPage
    {
        return $this->usuarioRepository->paginate($data->perPage, $data->page);
    }
}
