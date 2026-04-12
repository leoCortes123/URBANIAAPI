<?php

namespace App\Application\CategoriaConcepto\Handlers;

use App\Domain\CategoriaConcepto\Entities\CategoriaConcepto;
use App\Domain\CategoriaConcepto\Repositories\CategoriaConceptoRepositoryInterface;
use App\Domain\Common\Exceptions\ResourceNotFoundException;

final class GetCategoriaConceptoByIdHandler
{
    public function __construct(
        private CategoriaConceptoRepositoryInterface $categoriaConceptoRepository,
    ) {
    }

    public function handle(int $id): CategoriaConcepto
    {
        $categoriaConcepto = $this->categoriaConceptoRepository->findById($id);
        if ($categoriaConcepto === null) {
            throw ResourceNotFoundException::categoriaConcepto();
        }

        return $categoriaConcepto;
    }
}
