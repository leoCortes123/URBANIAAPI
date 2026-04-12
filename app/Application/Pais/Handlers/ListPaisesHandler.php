<?php

namespace App\Application\Pais\Handlers;

use App\Application\Pais\DTOs\ListPaisesData;
use App\Domain\Pais\Repositories\PaisRepositoryInterface;
use App\Domain\Pais\ValueObjects\PaisesPage;

final class ListPaisesHandler
{
    public function __construct(
        private PaisRepositoryInterface $paisRepository,
    ) {
    }

    public function handle(ListPaisesData $data): PaisesPage
    {
        return $this->paisRepository->paginate($data->perPage, $data->page);
    }
}
