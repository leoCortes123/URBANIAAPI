<?php

namespace App\Domain\Municipio\Repositories;

use App\Domain\Municipio\Entities\Municipio;
use App\Domain\Municipio\ValueObjects\MunicipiosPage;

interface MunicipioRepositoryInterface
{
    public function findById(int $id): ?Municipio;

    public function paginate(int $perPage = 15, int $page = 1): MunicipiosPage;

    public function save(Municipio $municipio): Municipio;

    public function delete(int $id): bool;
}
