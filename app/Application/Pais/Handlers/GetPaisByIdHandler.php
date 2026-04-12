<?php

namespace App\Application\Pais\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Pais\Entities\Pais;
use App\Domain\Pais\Repositories\PaisRepositoryInterface;

final class GetPaisByIdHandler
{
    public function __construct(
        private PaisRepositoryInterface $paisRepository,
    ) {
    }

    public function handle(int $id): Pais
    {
        $pais = $this->paisRepository->findById($id);
        if ($pais === null) {
            throw ResourceNotFoundException::pais();
        }

        return $pais;
    }
}
