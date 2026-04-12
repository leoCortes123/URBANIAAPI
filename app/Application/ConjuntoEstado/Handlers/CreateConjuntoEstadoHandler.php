<?php

namespace App\Application\ConjuntoEstado\Handlers;

use App\Application\ConjuntoEstado\DTOs\CreateConjuntoEstadoData;
use App\Domain\ConjuntoEstado\Entities\ConjuntoEstado;
use App\Domain\ConjuntoEstado\Repositories\ConjuntoEstadoRepositoryInterface;

final class CreateConjuntoEstadoHandler
{
    public function __construct(
        private ConjuntoEstadoRepositoryInterface $conjuntoEstadoRepository,
    ) {
    }

    public function handle(CreateConjuntoEstadoData $data): ConjuntoEstado
    {
        $conjuntoEstado = new ConjuntoEstado(
            null,
            $data->nombreConjesta,
            $data->descripcionConjesta,
            $data->ordenConjesta,
            $data->estadoConjesta,
        );

        return $this->conjuntoEstadoRepository->save($conjuntoEstado);
    }
}
