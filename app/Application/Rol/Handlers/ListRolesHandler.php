<?php

namespace App\Application\Rol\Handlers;

use App\Application\Rol\DTOs\ListRolesData;
use App\Domain\Rol\Repositories\RolRepositoryInterface;
use App\Domain\Rol\ValueObjects\RolesPage;

final class ListRolesHandler
{
    public function __construct(
        private RolRepositoryInterface $rolRepository,
    ) {
    }

    public function handle(ListRolesData $data): RolesPage
    {
        return $this->rolRepository->paginate($data->perPage, $data->page);
    }
}
