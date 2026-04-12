<?php

namespace App\Application\Municipio\Handlers;

use App\Application\Municipio\DTOs\CreateMunicipioData;
use App\Domain\Municipio\Entities\Municipio;
use App\Domain\Municipio\Repositories\MunicipioRepositoryInterface;

final class CreateMunicipioHandler
{
    public function __construct(
        private MunicipioRepositoryInterface $municipioRepository,
    ) {
    }

    public function handle(CreateMunicipioData $data): Municipio
    {
        $entity = new Municipio(
            null,
            $data->codigoDaneMunicipi,
            $data->nombreMunicipi,
            $data->estadoMunicipi,
            $data->departamentoId,
        );

        return $this->municipioRepository->save($entity);
    }
}
