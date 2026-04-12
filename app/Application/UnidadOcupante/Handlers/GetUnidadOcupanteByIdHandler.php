<?php

namespace App\Application\UnidadOcupante\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\UnidadOcupante\Entities\UnidadOcupante;
use App\Domain\UnidadOcupante\Repositories\UnidadOcupanteRepositoryInterface;

final class GetUnidadOcupanteByIdHandler
{
    public function __construct(
        private UnidadOcupanteRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id): UnidadOcupante
    {
        $row = $this->repository->findById($id);
        if ($row === null) {
            throw ResourceNotFoundException::unidadOcupante();
        }

        return $row;
    }
}
