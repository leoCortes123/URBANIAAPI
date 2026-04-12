<?php

namespace App\Application\ConceptoCobro\Handlers;

use App\Application\ConceptoCobro\DTOs\CreateConceptoCobroData;
use App\Domain\ConceptoCobro\Entities\ConceptoCobro;
use App\Domain\ConceptoCobro\Repositories\ConceptoCobroRepositoryInterface;

final class CreateConceptoCobroHandler
{
    public function __construct(
        private ConceptoCobroRepositoryInterface $repository,
    ) {
    }

    public function handle(CreateConceptoCobroData $data): ConceptoCobro
    {
        $entity = new ConceptoCobro(
            null,
            $data->categoriaConceptoId,
            $data->codigoConcepto,
            $data->nombreConcepto,
            $data->descripcionConcepto,
            $data->valorBaseConcepto,
            $data->periodicidadConcepto,
            $data->activoConcepto,
        );

        return $this->repository->save($entity);
    }
}
