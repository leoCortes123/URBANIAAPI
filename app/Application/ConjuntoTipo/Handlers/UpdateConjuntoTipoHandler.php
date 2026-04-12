<?php

namespace App\Application\ConjuntoTipo\Handlers;

use App\Application\ConjuntoTipo\DTOs\UpdateConjuntoTipoData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ConjuntoTipo\Entities\ConjuntoTipo;
use App\Domain\ConjuntoTipo\Repositories\ConjuntoTipoRepositoryInterface;

final class UpdateConjuntoTipoHandler
{
    public function __construct(
        private ConjuntoTipoRepositoryInterface $conjuntoTipoRepository,
    ) {
    }

    public function handle(int $id, UpdateConjuntoTipoData $data): ConjuntoTipo
    {
        $existing = $this->conjuntoTipoRepository->findById($id);
        if ($existing === null) {
            throw ResourceNotFoundException::conjuntoTipo();
        }

        $conjuntoTipo = new ConjuntoTipo(
            $id,
            $data->nombreTipoconj,
            $data->descripcionTipoconj,
            $data->estadoConest,
        );

        return $this->conjuntoTipoRepository->save($conjuntoTipo);
    }
}
