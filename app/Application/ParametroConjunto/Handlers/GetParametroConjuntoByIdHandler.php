<?php

namespace App\Application\ParametroConjunto\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ParametroConjunto\Entities\ParametroConjunto;
use App\Domain\ParametroConjunto\Repositories\ParametroConjuntoRepositoryInterface;

final class GetParametroConjuntoByIdHandler
{
    public function __construct(
        private ParametroConjuntoRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id): ParametroConjunto
    {
        $row = $this->repository->findById($id);
        if ($row === null) {
            throw ResourceNotFoundException::parametroConjunto();
        }

        return $row;
    }
}
