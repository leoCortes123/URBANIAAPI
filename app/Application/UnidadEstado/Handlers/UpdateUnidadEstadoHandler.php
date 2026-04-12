<?php

namespace App\Application\UnidadEstado\Handlers;

use App\Application\UnidadEstado\DTOs\UpdateUnidadEstadoData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\UnidadEstado\Entities\UnidadEstado;
use App\Domain\UnidadEstado\Repositories\UnidadEstadoRepositoryInterface;

final class UpdateUnidadEstadoHandler
{
    public function __construct(
        private UnidadEstadoRepositoryInterface $unidadEstadoRepository,
    ) {
    }

    public function handle(int $id, UpdateUnidadEstadoData $data): UnidadEstado
    {
        if ($this->unidadEstadoRepository->findById($id) === null) {
            throw ResourceNotFoundException::unidadEstado();
        }

        $unidadEstado = new UnidadEstado(
            $id,
            $data->nombreUnidesta,
            $data->codigoUnidesta,
            $data->descripcionUnidesta,
            $data->estadoUnidesta,
            $data->ordenUnidesta,
        );

        return $this->unidadEstadoRepository->save($unidadEstado);
    }
}
