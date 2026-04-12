<?php

namespace App\Application\ParametroConjunto\Handlers;

use App\Application\ParametroConjunto\DTOs\CreateParametroConjuntoData;
use App\Domain\ParametroConjunto\Entities\ParametroConjunto;
use App\Domain\ParametroConjunto\Repositories\ParametroConjuntoRepositoryInterface;

final class CreateParametroConjuntoHandler
{
    public function __construct(
        private ParametroConjuntoRepositoryInterface $repository,
    ) {
    }

    public function handle(CreateParametroConjuntoData $data): ParametroConjunto
    {
        $entity = new ParametroConjunto(null, $data->parametroSistemaId, $data->conjuntoId, $data->valorParamConjunto);

        return $this->repository->save($entity);
    }
}
