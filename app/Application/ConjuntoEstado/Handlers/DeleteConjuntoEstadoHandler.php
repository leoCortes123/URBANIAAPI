<?php

namespace App\Application\ConjuntoEstado\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ConjuntoEstado\Repositories\ConjuntoEstadoRepositoryInterface;

final class DeleteConjuntoEstadoHandler
{
    public function __construct(
        private ConjuntoEstadoRepositoryInterface $conjuntoEstadoRepository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->conjuntoEstadoRepository->findById($id) === null) {
            throw ResourceNotFoundException::conjuntoEstado();
        }

        $this->conjuntoEstadoRepository->delete($id);
    }
}
