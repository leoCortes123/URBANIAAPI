<?php

namespace App\Application\CategoriaConcepto\Handlers;

use App\Domain\CategoriaConcepto\Repositories\CategoriaConceptoRepositoryInterface;
use App\Domain\Common\Exceptions\ResourceNotFoundException;

final class DeleteCategoriaConceptoHandler
{
    public function __construct(
        private CategoriaConceptoRepositoryInterface $categoriaConceptoRepository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->categoriaConceptoRepository->findById($id) === null) {
            throw ResourceNotFoundException::categoriaConcepto();
        }

        $this->categoriaConceptoRepository->delete($id);
    }
}
