<?php

namespace App\Application\ParametroConjunto\Handlers;

use App\Application\ParametroConjunto\DTOs\ListParametrosConjuntoData;
use App\Domain\ParametroConjunto\Repositories\ParametroConjuntoRepositoryInterface;
use App\Domain\ParametroConjunto\ValueObjects\ParametrosConjuntoPage;

final class ListParametrosConjuntoHandler
{
    public function __construct(
        private ParametroConjuntoRepositoryInterface $repository,
    ) {
    }

    public function handle(ListParametrosConjuntoData $data): ParametrosConjuntoPage
    {
        return $this->repository->paginate($data->perPage, $data->page);
    }
}
