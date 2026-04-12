<?php

namespace App\Application\Pais\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Pais\Repositories\PaisRepositoryInterface;

final class DeletePaisHandler
{
    public function __construct(
        private PaisRepositoryInterface $paisRepository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->paisRepository->findById($id) === null) {
            throw ResourceNotFoundException::pais();
        }

        $this->paisRepository->delete($id);
    }
}
