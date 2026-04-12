<?php

namespace App\Application\ParametroConjunto\Handlers;

use App\Application\ParametroConjunto\DTOs\UpdateParametroConjuntoData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ParametroConjunto\Entities\ParametroConjunto;
use App\Domain\ParametroConjunto\Repositories\ParametroConjuntoRepositoryInterface;

final class UpdateParametroConjuntoHandler
{
    public function __construct(
        private ParametroConjuntoRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id, UpdateParametroConjuntoData $data): ParametroConjunto
    {
        if ($this->repository->findById($id) === null) {
            throw ResourceNotFoundException::parametroConjunto();
        }

        $entity = new ParametroConjunto($id, $data->parametroSistemaId, $data->conjuntoId, $data->valorParamConjunto);

        return $this->repository->save($entity);
    }
}
