<?php

namespace App\Application\Bloque\Handlers;

use App\Application\Bloque\DTOs\CreateBloqueData;
use App\Domain\Bloque\Entities\Bloque;
use App\Domain\Bloque\Repositories\BloqueRepositoryInterface;

final class CreateBloqueHandler
{
    public function __construct(
        private BloqueRepositoryInterface $bloqueRepository,
    ) {
    }

    public function handle(CreateBloqueData $data): Bloque
    {
        $entity = new Bloque(
            null,
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
