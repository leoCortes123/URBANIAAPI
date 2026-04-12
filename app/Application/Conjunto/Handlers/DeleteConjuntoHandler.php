<?php

namespace App\Application\Conjunto\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Conjunto\Repositories\ConjuntoRepositoryInterface;

final class DeleteConjuntoHandler
{
    public function __construct(
        private ConjuntoRepositoryInterface $conjuntoRepository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->conjuntoRepository->findById($id) === null) {
            throw ResourceNotFoundException::conjunto();
        }

        $this->conjuntoRepository->delete($id);
    }
}
