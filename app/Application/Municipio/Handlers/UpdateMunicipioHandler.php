<?php

namespace App\Application\Municipio\Handlers;

use App\Application\Municipio\DTOs\UpdateMunicipioData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Municipio\Entities\Municipio;
use App\Domain\Municipio\Repositories\MunicipioRepositoryInterface;

final class UpdateMunicipioHandler
{
    public function __construct(
        private MunicipioRepositoryInterface $municipioRepository,
    ) {
    }

    public function handle(int $id, UpdateMunicipioData $data): Municipio
    {
        if ($this->municipioRepository->findById($id) === null) {
            throw ResourceNotFoundException::municipio();
        }

        $entity = new Municipio(
            $id,
            $data->codigoDaneMunicipi,
            $data->nombreMunicipi,
            $data->estadoMunicipi,
            $data->departamentoId,
        );

        return $this->municipioRepository->save($entity);
    }
}
