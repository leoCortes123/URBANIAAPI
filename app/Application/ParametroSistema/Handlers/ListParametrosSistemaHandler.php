<?php

namespace App\Application\ParametroSistema\Handlers;

use App\Application\ParametroSistema\DTOs\ListParametrosSistemaData;
use App\Domain\ParametroSistema\Repositories\ParametroSistemaRepositoryInterface;
use App\Domain\ParametroSistema\ValueObjects\ParametrosSistemaPage;

final class ListParametrosSistemaHandler
{
    public function __construct(
        private ParametroSistemaRepositoryInterface $repository,
    ) {
    }

    public function handle(ListParametrosSistemaData $data): ParametrosSistemaPage
    {
        return $this->repository->paginate($data->perPage, $data->page);
    }
}
