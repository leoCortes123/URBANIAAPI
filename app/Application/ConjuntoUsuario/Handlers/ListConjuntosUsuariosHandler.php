<?php

namespace App\Application\ConjuntoUsuario\Handlers;

use App\Application\ConjuntoUsuario\DTOs\ListConjuntosUsuariosData;
use App\Domain\ConjuntoUsuario\Repositories\ConjuntoUsuarioRepositoryInterface;
use App\Domain\ConjuntoUsuario\ValueObjects\ConjuntosUsuariosPage;

final class ListConjuntosUsuariosHandler
{
    public function __construct(
        private ConjuntoUsuarioRepositoryInterface $repository,
    ) {
    }

    public function handle(ListConjuntosUsuariosData $data): ConjuntosUsuariosPage
    {
        return $this->repository->paginate($data->perPage, $data->page);
    }
}
