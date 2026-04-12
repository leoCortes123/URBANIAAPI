<?php

namespace App\Application\ConceptoCobro\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ConceptoCobro\Entities\ConceptoCobro;
use App\Domain\ConceptoCobro\Repositories\ConceptoCobroRepositoryInterface;

final class GetConceptoCobroByIdHandler
{
    public function __construct(
        private ConceptoCobroRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id): ConceptoCobro
    {
        $row = $this->repository->findById($id);
        if ($row === null) {
            throw ResourceNotFoundException::conceptoCobro();
        }

        return $row;
    }
}
