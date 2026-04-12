<?php

namespace App\Application\ParametroConjunto\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ParametroConjunto\Repositories\ParametroConjuntoRepositoryInterface;

final class DeleteParametroConjuntoHandler
{
    public function __construct(
        private ParametroConjuntoRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->repository->findById($id) === null) {
            throw ResourceNotFoundException::parametroConjunto();
        }

        $this->repository->delete($id);
    }
}
