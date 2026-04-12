<?php

namespace App\Application\Departamento\Handlers;

use App\Application\Departamento\DTOs\UpdateDepartamentoData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Departamento\Entities\Departamento;
use App\Domain\Departamento\Repositories\DepartamentoRepositoryInterface;

final class UpdateDepartamentoHandler
{
    public function __construct(
        private DepartamentoRepositoryInterface $departamentoRepository,
    ) {
    }

    public function handle(int $id, UpdateDepartamentoData $data): Departamento
    {
        if ($this->departamentoRepository->findById($id) === null) {
            throw ResourceNotFoundException::departamento();
        }

        $entity = new Departamento(
            $id,
            $data->codigoDaneDepartam,
            $data->nombreDepartam,
            $data->estadoDepartam,
            $data->paisId,
        );

        return $this->departamentoRepository->save($entity);
    }
}
