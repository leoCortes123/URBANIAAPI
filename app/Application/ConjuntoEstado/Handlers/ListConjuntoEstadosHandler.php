<?php

namespace App\Application\ConjuntoEstado\Handlers;

use App\Application\ConjuntoEstado\DTOs\ListConjuntoEstadosData;
use App\Domain\ConjuntoEstado\Repositories\ConjuntoEstadoRepositoryInterface;
use App\Domain\ConjuntoEstado\ValueObjects\ConjuntoEstadosPage;

final class ListConjuntoEstadosHandler
{
    public function __construct(
        private ConjuntoEstadoRepositoryInterface $conjuntoEstadoRepository,
    ) {
    }

    public function handle(ListConjuntoEstadosData $data): ConjuntoEstadosPage
    {
        return $this->conjuntoEstadoRepository->paginate($data->perPage, $data->page);
    }
}
