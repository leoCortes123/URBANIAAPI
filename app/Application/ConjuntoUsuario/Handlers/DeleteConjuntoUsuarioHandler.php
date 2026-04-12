<?php

namespace App\Application\ConjuntoUsuario\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ConjuntoUsuario\Repositories\ConjuntoUsuarioRepositoryInterface;

final class DeleteConjuntoUsuarioHandler
{
    public function __construct(
        private ConjuntoUsuarioRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->repository->findById($id) === null) {
            throw ResourceNotFoundException::conjuntoUsuario();
        }

        $this->repository->delete($id);
    }
}
