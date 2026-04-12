<?php

namespace App\Application\UnidadEstado\Handlers;

use App\Application\UnidadEstado\DTOs\CreateUnidadEstadoData;
use App\Domain\UnidadEstado\Entities\UnidadEstado;
use App\Domain\UnidadEstado\Repositories\UnidadEstadoRepositoryInterface;

final class CreateUnidadEstadoHandler
{
    public function __construct(
        private UnidadEstadoRepositoryInterface $unidadEstadoRepository,
    ) {
    }

    public function handle(CreateUnidadEstadoData $data): UnidadEstado
    {
        $unidadEstado = new UnidadEstado(
            null,
            $data->nombreUnidesta,
            $data->codigoUnidesta,
            $data->descripcionUnidesta,
            $data->estadoUnidesta,
            $data->ordenUnidesta,
        );

        return $this->unidadEstadoRepository->save($unidadEstado);
    }
}
