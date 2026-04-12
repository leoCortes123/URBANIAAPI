<?php

namespace App\Application\Conjunto\Handlers;

use App\Application\Conjunto\DTOs\ListConjuntosData;
use App\Domain\Conjunto\Repositories\ConjuntoRepositoryInterface;
use App\Domain\Conjunto\ValueObjects\ConjuntosPage;

final class ListConjuntosHandler
{
    public function __construct(
        private ConjuntoRepositoryInterface $conjuntoRepository,
    ) {
    }

    public function handle(ListConjuntosData $data): ConjuntosPage
    {
        return $this->conjuntoRepository->paginate($data->perPage, $data->page);
    }
}
