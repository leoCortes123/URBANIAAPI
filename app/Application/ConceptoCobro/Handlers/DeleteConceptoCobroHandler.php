<?php

namespace App\Application\ConceptoCobro\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ConceptoCobro\Repositories\ConceptoCobroRepositoryInterface;

final class DeleteConceptoCobroHandler
{
    public function __construct(
        private ConceptoCobroRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->repository->findById($id) === null) {
            throw ResourceNotFoundException::conceptoCobro();
        }

        $this->repository->delete($id);
    }
}
