<?php

namespace App\Application\Rol\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Rol\Repositories\RolRepositoryInterface;

final class DeleteRolHandler
{
    public function __construct(
        private RolRepositoryInterface $rolRepository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->rolRepository->findById($id) === null) {
            throw ResourceNotFoundException::rol();
        }

        $this->rolRepository->delete($id);
    }
}
