<?php

namespace App\Application\UnidadOcupante\Handlers;

use App\Application\UnidadOcupante\DTOs\UpdateUnidadOcupanteData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\UnidadOcupante\Entities\UnidadOcupante;
use App\Domain\UnidadOcupante\Repositories\UnidadOcupanteRepositoryInterface;

final class UpdateUnidadOcupanteHandler
{
    public function __construct(
        private UnidadOcupanteRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id, UpdateUnidadOcupanteData $data): UnidadOcupante
    {
        if ($this->repository->findById($id) === null) {
            throw ResourceNotFoundException::unidadOcupante();
        }

        $entity = new UnidadOcupante(
            $id,
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
