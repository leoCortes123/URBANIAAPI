<?php

namespace App\Application\UnidadOcupante\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\UnidadOcupante\Repositories\UnidadOcupanteRepositoryInterface;

final class DeleteUnidadOcupanteHandler
{
    public function __construct(
        private UnidadOcupanteRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->repository->findById($id) === null) {
            throw ResourceNotFoundException::unidadOcupante();
        }

        $this->repository->delete($id);
    }
}
