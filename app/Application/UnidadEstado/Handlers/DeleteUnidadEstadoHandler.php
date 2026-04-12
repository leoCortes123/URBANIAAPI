<?php

namespace App\Application\UnidadEstado\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\UnidadEstado\Repositories\UnidadEstadoRepositoryInterface;

final class DeleteUnidadEstadoHandler
{
    public function __construct(
        private UnidadEstadoRepositoryInterface $unidadEstadoRepository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->unidadEstadoRepository->findById($id) === null) {
            throw ResourceNotFoundException::unidadEstado();
        }

        $this->unidadEstadoRepository->delete($id);
    }
}
