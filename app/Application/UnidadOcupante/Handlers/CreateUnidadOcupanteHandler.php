<?php

namespace App\Application\UnidadOcupante\Handlers;

use App\Application\UnidadOcupante\DTOs\CreateUnidadOcupanteData;
use App\Domain\UnidadOcupante\Entities\UnidadOcupante;
use App\Domain\UnidadOcupante\Repositories\UnidadOcupanteRepositoryInterface;

final class CreateUnidadOcupanteHandler
{
    public function __construct(
        private UnidadOcupanteRepositoryInterface $repository,
    ) {
    }

    public function handle(CreateUnidadOcupanteData $data): UnidadOcupante
    {
        $entity = new UnidadOcupante(
            null,
            $data->tipoOcupante,
            $data->esTitular,
            $data->fechaInicio,
            $data->fechaFin,
            $data->estadoOcupante,
            $data->observaciones,
            $data->unidadId,
            $data->userId,
            $data->conjuntoId,
        );

        return $this->repository->save($entity);
    }
}
