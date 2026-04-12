<?php

namespace App\Application\ParametroSistema\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ParametroSistema\Entities\ParametroSistema;
use App\Domain\ParametroSistema\Repositories\ParametroSistemaRepositoryInterface;

final class GetParametroSistemaByIdHandler
{
    public function __construct(
        private ParametroSistemaRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id): ParametroSistema
    {
        $row = $this->repository->findById($id);
        if ($row === null) {
            throw ResourceNotFoundException::parametroSistema();
        }

        return $row;
    }
}
