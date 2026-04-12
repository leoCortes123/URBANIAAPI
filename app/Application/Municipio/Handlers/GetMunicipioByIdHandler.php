<?php

namespace App\Application\Municipio\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Municipio\Entities\Municipio;
use App\Domain\Municipio\Repositories\MunicipioRepositoryInterface;

final class GetMunicipioByIdHandler
{
    public function __construct(
        private MunicipioRepositoryInterface $municipioRepository,
    ) {
    }

    public function handle(int $id): Municipio
    {
        $row = $this->municipioRepository->findById($id);
        if ($row === null) {
            throw ResourceNotFoundException::municipio();
        }

        return $row;
    }
}
