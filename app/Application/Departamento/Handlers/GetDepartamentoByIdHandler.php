<?php

namespace App\Application\Departamento\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Departamento\Entities\Departamento;
use App\Domain\Departamento\Repositories\DepartamentoRepositoryInterface;

final class GetDepartamentoByIdHandler
{
    public function __construct(
        private DepartamentoRepositoryInterface $departamentoRepository,
    ) {
    }

    public function handle(int $id): Departamento
    {
        $row = $this->departamentoRepository->findById($id);
        if ($row === null) {
            throw ResourceNotFoundException::departamento();
        }

        return $row;
    }
}
