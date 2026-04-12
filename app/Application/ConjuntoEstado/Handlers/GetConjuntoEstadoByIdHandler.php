<?php

namespace App\Application\ConjuntoEstado\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ConjuntoEstado\Entities\ConjuntoEstado;
use App\Domain\ConjuntoEstado\Repositories\ConjuntoEstadoRepositoryInterface;

final class GetConjuntoEstadoByIdHandler
{
    public function __construct(
        private ConjuntoEstadoRepositoryInterface $conjuntoEstadoRepository,
    ) {
    }

    public function handle(int $id): ConjuntoEstado
    {
        $conjuntoEstado = $this->conjuntoEstadoRepository->findById($id);
        if ($conjuntoEstado === null) {
            throw ResourceNotFoundException::conjuntoEstado();
        }

        return $conjuntoEstado;
    }
}
