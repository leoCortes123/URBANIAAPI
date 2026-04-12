<?php

namespace App\Application\Unidad\Handlers;

use App\Application\Unidad\DTOs\ListUnidadesData;
use App\Domain\Unidad\Repositories\UnidadRepositoryInterface;
use App\Domain\Unidad\ValueObjects\UnidadesPage;

final class ListUnidadesHandler
{
    public function __construct(
        private UnidadRepositoryInterface $unidadRepository,
    ) {
    }

    public function handle(ListUnidadesData $data): UnidadesPage
    {
        return $this->unidadRepository->paginate($data->perPage, $data->page);
    }
}
