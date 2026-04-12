<?php

namespace App\Application\Bloque\Handlers;

use App\Domain\Bloque\Entities\Bloque;
use App\Domain\Bloque\Repositories\BloqueRepositoryInterface;
use App\Domain\Common\Exceptions\ResourceNotFoundException;

final class GetBloqueByIdHandler
{
    public function __construct(
        private BloqueRepositoryInterface $bloqueRepository,
    ) {
    }

    public function handle(int $id): Bloque
    {
        $row = $this->bloqueRepository->findById($id);
        if ($row === null) {
            throw ResourceNotFoundException::bloque();
        }

        return $row;
    }
}
