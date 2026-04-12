<?php

namespace App\Application\UnidadEstado\Handlers;

use App\Application\UnidadEstado\DTOs\ListUnidadEstadosData;
use App\Domain\UnidadEstado\Repositories\UnidadEstadoRepositoryInterface;
use App\Domain\UnidadEstado\ValueObjects\UnidadEstadosPage;

final class ListUnidadEstadosHandler
{
    public function __construct(
        private UnidadEstadoRepositoryInterface $unidadEstadoRepository,
    ) {
    }

    public function handle(ListUnidadEstadosData $data): UnidadEstadosPage
    {
        return $this->unidadEstadoRepository->paginate($data->perPage, $data->page);
    }
}
