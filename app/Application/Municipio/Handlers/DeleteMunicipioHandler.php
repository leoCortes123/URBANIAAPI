<?php

namespace App\Application\Municipio\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Municipio\Repositories\MunicipioRepositoryInterface;

final class DeleteMunicipioHandler
{
    public function __construct(
        private MunicipioRepositoryInterface $municipioRepository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->municipioRepository->findById($id) === null) {
            throw ResourceNotFoundException::municipio();
        }

        $this->municipioRepository->delete($id);
    }
}
