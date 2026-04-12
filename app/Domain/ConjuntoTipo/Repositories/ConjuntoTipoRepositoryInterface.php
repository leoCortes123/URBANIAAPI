<?php

namespace App\Domain\ConjuntoTipo\Repositories;

use App\Domain\ConjuntoTipo\Entities\ConjuntoTipo;
use App\Domain\ConjuntoTipo\ValueObjects\ConjuntoTiposPage;

interface ConjuntoTipoRepositoryInterface
{
    public function findById(int $id): ?ConjuntoTipo;

    public function paginate(int $perPage = 15, int $page = 1): ConjuntoTiposPage;

    public function save(ConjuntoTipo $conjuntoTipo): ConjuntoTipo;

    public function delete(int $id): bool;
}
