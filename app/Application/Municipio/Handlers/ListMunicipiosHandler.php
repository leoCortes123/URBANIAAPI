<?php

namespace App\Application\Municipio\Handlers;

use App\Application\Municipio\DTOs\ListMunicipiosData;
use App\Domain\Municipio\Repositories\MunicipioRepositoryInterface;
use App\Domain\Municipio\ValueObjects\MunicipiosPage;

final class ListMunicipiosHandler
{
    public function __construct(
        private MunicipioRepositoryInterface $municipioRepository,
    ) {
    }

    public function handle(ListMunicipiosData $data): MunicipiosPage
    {
        return $this->municipioRepository->paginate($data->perPage, $data->page);
    }
}
