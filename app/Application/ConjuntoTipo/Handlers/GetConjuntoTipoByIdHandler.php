<?php

namespace App\Application\ConjuntoTipo\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ConjuntoTipo\Entities\ConjuntoTipo;
use App\Domain\ConjuntoTipo\Repositories\ConjuntoTipoRepositoryInterface;

final class GetConjuntoTipoByIdHandler
{
    public function __construct(
        private ConjuntoTipoRepositoryInterface $conjuntoTipoRepository,
    ) {
    }

    public function handle(int $id): ConjuntoTipo
    {
        $conjuntoTipo = $this->conjuntoTipoRepository->findById($id);
        if ($conjuntoTipo === null) {
            throw ResourceNotFoundException::conjuntoTipo();
        }

        return $conjuntoTipo;
    }
}
