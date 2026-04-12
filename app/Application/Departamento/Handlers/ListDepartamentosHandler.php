<?php

namespace App\Application\Departamento\Handlers;

use App\Application\Departamento\DTOs\ListDepartamentosData;
use App\Domain\Departamento\Repositories\DepartamentoRepositoryInterface;
use App\Domain\Departamento\ValueObjects\DepartamentosPage;

final class ListDepartamentosHandler
{
    public function __construct(
        private DepartamentoRepositoryInterface $departamentoRepository,
    ) {
    }

    public function handle(ListDepartamentosData $data): DepartamentosPage
    {
        return $this->departamentoRepository->paginate($data->perPage, $data->page);
    }
}
