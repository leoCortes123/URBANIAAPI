<?php

namespace App\Application\ConjuntoTipo\Handlers;

use App\Application\ConjuntoTipo\DTOs\CreateConjuntoTipoData;
use App\Domain\ConjuntoTipo\Entities\ConjuntoTipo;
use App\Domain\ConjuntoTipo\Repositories\ConjuntoTipoRepositoryInterface;

final class CreateConjuntoTipoHandler
{
    public function __construct(
        private ConjuntoTipoRepositoryInterface $conjuntoTipoRepository,
    ) {
    }

    public function handle(CreateConjuntoTipoData $data): ConjuntoTipo
    {
        $conjuntoTipo = new ConjuntoTipo(
            null,
            $data->nombreTipoconj,
            $data->descripcionTipoconj,
            $data->estadoConest,
        );

        return $this->conjuntoTipoRepository->save($conjuntoTipo);
    }
}
