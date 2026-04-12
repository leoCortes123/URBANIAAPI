<?php

namespace App\Application\Bloque\Handlers;

use App\Application\Bloque\DTOs\ListBloquesData;
use App\Domain\Bloque\Repositories\BloqueRepositoryInterface;
use App\Domain\Bloque\ValueObjects\BloquesPage;

final class ListBloquesHandler
{
    public function __construct(
        private BloqueRepositoryInterface $bloqueRepository,
    ) {
    }

    public function handle(ListBloquesData $data): BloquesPage
    {
        return $this->bloqueRepository->paginate($data->perPage, $data->page);
    }
}
