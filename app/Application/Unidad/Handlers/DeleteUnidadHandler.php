<?php

namespace App\Application\Unidad\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Unidad\Repositories\UnidadRepositoryInterface;

final class DeleteUnidadHandler
{
    public function __construct(
        private UnidadRepositoryInterface $unidadRepository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->unidadRepository->findById($id) === null) {
            throw ResourceNotFoundException::unidad();
        }

        $this->unidadRepository->delete($id);
    }
}
