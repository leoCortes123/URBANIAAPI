<?php

namespace App\Application\Pais\Handlers;

use App\Application\Pais\DTOs\CreatePaisData;
use App\Domain\Pais\Entities\Pais;
use App\Domain\Pais\Repositories\PaisRepositoryInterface;

final class CreatePaisHandler
{
    public function __construct(
        private PaisRepositoryInterface $paisRepository,
    ) {
    }

    public function handle(CreatePaisData $data): Pais
    {
        $pais = new Pais(
            null,
            $data->codigoPais,
            $data->nombrePais,
            $data->codigoIsoPais,
            $data->estadoPais,
        );

        return $this->paisRepository->save($pais);
    }
}
