<?php

namespace App\Domain\ParametroConjunto\Repositories;

use App\Domain\ParametroConjunto\Entities\ParametroConjunto;
use App\Domain\ParametroConjunto\ValueObjects\ParametrosConjuntoPage;

interface ParametroConjuntoRepositoryInterface
{
    public function findById(int $id): ?ParametroConjunto;

    public function paginate(int $perPage = 15, int $page = 1): ParametrosConjuntoPage;

    public function save(ParametroConjunto $parametroConjunto): ParametroConjunto;

    public function delete(int $id): bool;
}
