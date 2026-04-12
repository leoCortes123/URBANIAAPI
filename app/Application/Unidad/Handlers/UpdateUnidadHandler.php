<?php

namespace App\Application\Unidad\Handlers;

use App\Application\Unidad\DTOs\UpdateUnidadData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Unidad\Entities\Unidad;
use App\Domain\Unidad\Repositories\UnidadRepositoryInterface;

final class UpdateUnidadHandler
{
    public function __construct(
        private UnidadRepositoryInterface $unidadRepository,
    ) {
    }

    public function handle(int $id, UpdateUnidadData $data): Unidad
    {
        if ($this->unidadRepository->findById($id) === null) {
            throw ResourceNotFoundException::unidad();
        }

        $entity = new Unidad(
            $id,
            $data->numeroUnidad,
            $data->codigoUnidad,
            $data->pisoUnidad,
            $data->areaM2Unidad,
            $data->coeficienteUnidad,
            $data->estadoUnidad,
            $data->bloqueId,
            $data->conjuntoId,
            $data->estadoOcupacionId,
        );

        return $this->unidadRepository->save($entity);
    }
}
