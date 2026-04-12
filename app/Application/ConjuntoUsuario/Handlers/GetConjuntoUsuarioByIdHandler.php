<?php

namespace App\Application\ConjuntoUsuario\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ConjuntoUsuario\Entities\ConjuntoUsuario;
use App\Domain\ConjuntoUsuario\Repositories\ConjuntoUsuarioRepositoryInterface;

final class GetConjuntoUsuarioByIdHandler
{
    public function __construct(
        private ConjuntoUsuarioRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id): ConjuntoUsuario
    {
        $row = $this->repository->findById($id);
        if ($row === null) {
            throw ResourceNotFoundException::conjuntoUsuario();
        }

        return $row;
    }
}
