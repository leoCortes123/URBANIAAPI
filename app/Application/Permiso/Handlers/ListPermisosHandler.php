<?php

namespace App\Application\Permiso\Handlers;

use App\Application\Permiso\DTOs\ListPermisosData;
use App\Domain\Permiso\Repositories\PermisoRepositoryInterface;
use App\Domain\Permiso\ValueObjects\PermisosPage;

final class ListPermisosHandler
{
    public function __construct(
        private PermisoRepositoryInterface $permisoRepository,
    ) {
    }

    public function handle(ListPermisosData $data): PermisosPage
    {
        return $this->permisoRepository->paginate($data->perPage, $data->page);
    }
}
