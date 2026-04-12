<?php

namespace App\Application\UnidadOcupante\Handlers;

use App\Application\UnidadOcupante\DTOs\ListUnidadesOcupantesData;
use App\Domain\UnidadOcupante\Repositories\UnidadOcupanteRepositoryInterface;
use App\Domain\UnidadOcupante\ValueObjects\UnidadesOcupantesPage;

final class ListUnidadesOcupantesHandler
{
    public function __construct(
        private UnidadOcupanteRepositoryInterface $repository,
    ) {
    }

    public function handle(ListUnidadesOcupantesData $data): UnidadesOcupantesPage
    {
        return $this->repository->paginate($data->perPage, $data->page);
    }
}
