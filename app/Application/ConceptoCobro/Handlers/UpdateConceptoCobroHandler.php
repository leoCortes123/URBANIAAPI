<?php

namespace App\Application\ConceptoCobro\Handlers;

use App\Application\ConceptoCobro\DTOs\UpdateConceptoCobroData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ConceptoCobro\Entities\ConceptoCobro;
use App\Domain\ConceptoCobro\Repositories\ConceptoCobroRepositoryInterface;

final class UpdateConceptoCobroHandler
{
    public function __construct(
        private ConceptoCobroRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id, UpdateConceptoCobroData $data): ConceptoCobro
    {
        if ($this->repository->findById($id) === null) {
            throw ResourceNotFoundException::conceptoCobro();
        }

        $entity = new ConceptoCobro(
            $id,
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
