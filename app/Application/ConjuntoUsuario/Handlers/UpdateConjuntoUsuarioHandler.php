<?php

namespace App\Application\ConjuntoUsuario\Handlers;

use App\Application\ConjuntoUsuario\DTOs\UpdateConjuntoUsuarioData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ConjuntoUsuario\Entities\ConjuntoUsuario;
use App\Domain\ConjuntoUsuario\Repositories\ConjuntoUsuarioRepositoryInterface;

final class UpdateConjuntoUsuarioHandler
{
    public function __construct(
        private ConjuntoUsuarioRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id, UpdateConjuntoUsuarioData $data): ConjuntoUsuario
    {
        if ($this->repository->findById($id) === null) {
            throw ResourceNotFoundException::conjuntoUsuario();
        }

        $entity = new ConjuntoUsuario($id, $data->userId, $data->conjuntoId, $data->fechaVinculacion, $data->estadoConjuser);

        return $this->repository->save($entity);
    }
}
