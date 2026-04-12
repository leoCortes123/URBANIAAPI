<?php

namespace App\Application\CategoriaConcepto\Handlers;

use App\Application\CategoriaConcepto\DTOs\UpdateCategoriaConceptoData;
use App\Domain\CategoriaConcepto\Entities\CategoriaConcepto;
use App\Domain\CategoriaConcepto\Repositories\CategoriaConceptoRepositoryInterface;
use App\Domain\Common\Exceptions\ResourceNotFoundException;

final class UpdateCategoriaConceptoHandler
{
    public function __construct(
        private CategoriaConceptoRepositoryInterface $categoriaConceptoRepository,
    ) {
    }

    public function handle(int $id, UpdateCategoriaConceptoData $data): CategoriaConcepto
    {
        if ($this->categoriaConceptoRepository->findById($id) === null) {
            throw ResourceNotFoundException::categoriaConcepto();
        }

        $categoriaConcepto = new CategoriaConcepto(
            $id,
            $data->nombreCatconc,
            $data->codigoCatconc,
            $data->descripcionCatconc,
            $data->ordenCatconc,
            $data->estadoCatconc,
        );

        return $this->categoriaConceptoRepository->save($categoriaConcepto);
    }
}
