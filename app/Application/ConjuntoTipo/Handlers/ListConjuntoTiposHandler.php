<?php

namespace App\Application\ConjuntoTipo\Handlers;

use App\Application\ConjuntoTipo\DTOs\ListConjuntoTiposData;
use App\Domain\ConjuntoTipo\Repositories\ConjuntoTipoRepositoryInterface;
use App\Domain\ConjuntoTipo\ValueObjects\ConjuntoTiposPage;

final class ListConjuntoTiposHandler
{
    public function __construct(
        private ConjuntoTipoRepositoryInterface $conjuntoTipoRepository,
    ) {
    }

    public function handle(ListConjuntoTiposData $data): ConjuntoTiposPage
    {
        return $this->conjuntoTipoRepository->paginate($data->perPage, $data->page);
    }
}
