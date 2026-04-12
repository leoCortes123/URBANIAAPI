<?php

namespace App\Application\CategoriaConcepto\Handlers;

use App\Application\CategoriaConcepto\DTOs\CreateCategoriaConceptoData;
use App\Domain\CategoriaConcepto\Entities\CategoriaConcepto;
use App\Domain\CategoriaConcepto\Repositories\CategoriaConceptoRepositoryInterface;

final class CreateCategoriaConceptoHandler
{
    public function __construct(
        private CategoriaConceptoRepositoryInterface $categoriaConceptoRepository,
    ) {
    }

    public function handle(CreateCategoriaConceptoData $data): CategoriaConcepto
    {
        $categoriaConcepto = new CategoriaConcepto(
            null,
            $data->nombreCatconc,
            $data->codigoCatconc,
            $data->descripcionCatconc,
            $data->ordenCatconc,
            $data->estadoCatconc,
        );

        return $this->categoriaConceptoRepository->save($categoriaConcepto);
    }
}
