<?php

namespace App\Application\Unidad\Handlers;

use App\Application\Unidad\DTOs\CreateUnidadData;
use App\Domain\Unidad\Entities\Unidad;
use App\Domain\Unidad\Repositories\UnidadRepositoryInterface;

final class CreateUnidadHandler
{
    public function __construct(
        private UnidadRepositoryInterface $unidadRepository,
    ) {
    }

    public function handle(CreateUnidadData $data): Unidad
    {
        $entity = new Unidad(
            null,
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
