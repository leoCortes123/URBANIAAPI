<?php

namespace App\Application\Departamento\Handlers;

use App\Application\Departamento\DTOs\CreateDepartamentoData;
use App\Domain\Departamento\Entities\Departamento;
use App\Domain\Departamento\Repositories\DepartamentoRepositoryInterface;

final class CreateDepartamentoHandler
{
    public function __construct(
        private DepartamentoRepositoryInterface $departamentoRepository,
    ) {
    }

    public function handle(CreateDepartamentoData $data): Departamento
    {
        $entity = new Departamento(
            null,
            $data->codigoDaneDepartam,
            $data->nombreDepartam,
            $data->estadoDepartam,
            $data->paisId,
        );

        return $this->departamentoRepository->save($entity);
    }
}
