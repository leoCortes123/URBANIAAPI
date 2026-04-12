<?php

namespace App\Application\Bloque\Handlers;

use App\Domain\Bloque\Repositories\BloqueRepositoryInterface;
use App\Domain\Common\Exceptions\ResourceNotFoundException;

final class DeleteBloqueHandler
{
    public function __construct(
        private BloqueRepositoryInterface $bloqueRepository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->bloqueRepository->findById($id) === null) {
            throw ResourceNotFoundException::bloque();
        }

        $this->bloqueRepository->delete($id);
    }
}
