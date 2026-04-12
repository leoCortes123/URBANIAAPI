<?php

namespace App\Application\ConjuntoUsuario\Handlers;

use App\Application\ConjuntoUsuario\DTOs\CreateConjuntoUsuarioData;
use App\Domain\ConjuntoUsuario\Entities\ConjuntoUsuario;
use App\Domain\ConjuntoUsuario\Repositories\ConjuntoUsuarioRepositoryInterface;

final class CreateConjuntoUsuarioHandler
{
    public function __construct(
        private ConjuntoUsuarioRepositoryInterface $repository,
    ) {
    }

    public function handle(CreateConjuntoUsuarioData $data): ConjuntoUsuario
    {
        $entity = new ConjuntoUsuario(null, $data->userId, $data->conjuntoId, $data->fechaVinculacion, $data->estadoConjuser);

        return $this->repository->save($entity);
    }
}
