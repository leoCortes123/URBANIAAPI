<?php

namespace App\Application\Departamento\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Departamento\Repositories\DepartamentoRepositoryInterface;

final class DeleteDepartamentoHandler
{
    public function __construct(
        private DepartamentoRepositoryInterface $departamentoRepository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->departamentoRepository->findById($id) === null) {
            throw ResourceNotFoundException::departamento();
        }

        $this->departamentoRepository->delete($id);
    }
}
