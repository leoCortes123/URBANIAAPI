<?php

namespace App\Application\UnidadEstado\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\UnidadEstado\Entities\UnidadEstado;
use App\Domain\UnidadEstado\Repositories\UnidadEstadoRepositoryInterface;

final class GetUnidadEstadoByIdHandler
{
    public function __construct(
        private UnidadEstadoRepositoryInterface $unidadEstadoRepository,
    ) {
    }

    public function handle(int $id): UnidadEstado
    {
        $unidadEstado = $this->unidadEstadoRepository->findById($id);
        if ($unidadEstado === null) {
            throw ResourceNotFoundException::unidadEstado();
        }

        return $unidadEstado;
    }
}
