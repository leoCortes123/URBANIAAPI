<?php

namespace App\Application\ParametroSistema\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ParametroSistema\Repositories\ParametroSistemaRepositoryInterface;

final class DeleteParametroSistemaHandler
{
    public function __construct(
        private ParametroSistemaRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->repository->findById($id) === null) {
            throw ResourceNotFoundException::parametroSistema();
        }

        $this->repository->delete($id);
    }
}
