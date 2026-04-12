<?php

namespace App\Application\ConjuntoTipo\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ConjuntoTipo\Repositories\ConjuntoTipoRepositoryInterface;

final class DeleteConjuntoTipoHandler
{
    public function __construct(
        private ConjuntoTipoRepositoryInterface $conjuntoTipoRepository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->conjuntoTipoRepository->findById($id) === null) {
            throw ResourceNotFoundException::conjuntoTipo();
        }

        $this->conjuntoTipoRepository->delete($id);
    }
}
