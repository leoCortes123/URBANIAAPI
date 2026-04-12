<?php

namespace App\Application\Conjunto\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Conjunto\Entities\Conjunto;
use App\Domain\Conjunto\Repositories\ConjuntoRepositoryInterface;

final class GetConjuntoByIdHandler
{
    public function __construct(
        private ConjuntoRepositoryInterface $conjuntoRepository,
    ) {
    }

    public function handle(int $id): Conjunto
    {
        $row = $this->conjuntoRepository->findById($id);
        if ($row === null) {
            throw ResourceNotFoundException::conjunto();
        }

        return $row;
    }
}
