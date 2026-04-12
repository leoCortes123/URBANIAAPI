<?php

namespace App\Application\Unidad\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Unidad\Entities\Unidad;
use App\Domain\Unidad\Repositories\UnidadRepositoryInterface;

final class GetUnidadByIdHandler
{
    public function __construct(
        private UnidadRepositoryInterface $unidadRepository,
    ) {
    }

    public function handle(int $id): Unidad
    {
        $row = $this->unidadRepository->findById($id);
        if ($row === null) {
            throw ResourceNotFoundException::unidad();
        }

        return $row;
    }
}
