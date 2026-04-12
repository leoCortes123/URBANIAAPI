<?php

namespace App\Domain\UnidadOcupante\Repositories;

use App\Domain\UnidadOcupante\Entities\UnidadOcupante;
use App\Domain\UnidadOcupante\ValueObjects\UnidadesOcupantesPage;

interface UnidadOcupanteRepositoryInterface
{
    public function findById(int $id): ?UnidadOcupante;

    public function paginate(int $perPage = 15, int $page = 1): UnidadesOcupantesPage;

    public function save(UnidadOcupante $unidadOcupante): UnidadOcupante;

    public function delete(int $id): bool;
}
