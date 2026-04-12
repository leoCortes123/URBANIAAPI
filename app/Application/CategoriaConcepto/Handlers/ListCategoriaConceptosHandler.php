<?php

namespace App\Application\CategoriaConcepto\Handlers;

use App\Application\CategoriaConcepto\DTOs\ListCategoriaConceptosData;
use App\Domain\CategoriaConcepto\Repositories\CategoriaConceptoRepositoryInterface;
use App\Domain\CategoriaConcepto\ValueObjects\CategoriaConceptosPage;

final class ListCategoriaConceptosHandler
{
    public function __construct(
        private CategoriaConceptoRepositoryInterface $categoriaConceptoRepository,
    ) {
    }

    public function handle(ListCategoriaConceptosData $data): CategoriaConceptosPage
    {
        return $this->categoriaConceptoRepository->paginate($data->perPage, $data->page);
    }
}
