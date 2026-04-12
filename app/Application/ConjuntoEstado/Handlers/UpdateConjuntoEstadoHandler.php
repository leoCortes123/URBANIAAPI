<?php

namespace App\Application\ConjuntoEstado\Handlers;

use App\Application\ConjuntoEstado\DTOs\UpdateConjuntoEstadoData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ConjuntoEstado\Entities\ConjuntoEstado;
use App\Domain\ConjuntoEstado\Repositories\ConjuntoEstadoRepositoryInterface;

final class UpdateConjuntoEstadoHandler
{
    public function __construct(
        private ConjuntoEstadoRepositoryInterface $conjuntoEstadoRepository,
    ) {
    }

    public function handle(int $id, UpdateConjuntoEstadoData $data): ConjuntoEstado
    {
        $existing = $this->conjuntoEstadoRepository->findById($id);
        if ($existing === null) {
            throw ResourceNotFoundException::conjuntoEstado();
        }

        $conjuntoEstado = new ConjuntoEstado(
            $id,
            $data->nombreConjesta,
            $data->descripcionConjesta,
            $data->ordenConjesta,
            $data->estadoConjesta,
        );

        return $this->conjuntoEstadoRepository->save($conjuntoEstado);
    }
}
