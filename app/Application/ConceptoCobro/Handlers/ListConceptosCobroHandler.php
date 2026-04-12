<?php

namespace App\Application\ConceptoCobro\Handlers;

use App\Application\ConceptoCobro\DTOs\ListConceptosCobroData;
use App\Domain\ConceptoCobro\Repositories\ConceptoCobroRepositoryInterface;
use App\Domain\ConceptoCobro\ValueObjects\ConceptosCobroPage;

final class ListConceptosCobroHandler
{
    public function __construct(
        private ConceptoCobroRepositoryInterface $repository,
    ) {
    }

    public function handle(ListConceptosCobroData $data): ConceptosCobroPage
    {
        return $this->repository->paginate($data->perPage, $data->page);
    }
}
