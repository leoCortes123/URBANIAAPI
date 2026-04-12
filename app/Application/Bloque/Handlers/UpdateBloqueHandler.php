<?php

namespace App\Application\Bloque\Handlers;

use App\Application\Bloque\DTOs\UpdateBloqueData;
use App\Domain\Bloque\Entities\Bloque;
use App\Domain\Bloque\Repositories\BloqueRepositoryInterface;
use App\Domain\Common\Exceptions\ResourceNotFoundException;

final class UpdateBloqueHandler
{
    public function __construct(
        private BloqueRepositoryInterface $bloqueRepository,
    ) {
    }

    public function handle(int $id, UpdateBloqueData $data): Bloque
    {
        if ($this->bloqueRepository->findById($id) === null) {
            throw ResourceNotFoundException::bloque();
        }

        $entity = new Bloque(
            $id,
            $data->nombreBloque,
            $data->descripcionBloque,
            $data->numeroUnidadesBloque,
            $data->ordenBloque,
            $data->estadoBloque,
            $data->conjuntoId,
        );

        return $this->bloqueRepository->save($entity);
    }
}
