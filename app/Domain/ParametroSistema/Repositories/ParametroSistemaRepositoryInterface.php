<?php

namespace App\Domain\ParametroSistema\Repositories;

use App\Domain\ParametroSistema\Entities\ParametroSistema;
use App\Domain\ParametroSistema\ValueObjects\ParametrosSistemaPage;

interface ParametroSistemaRepositoryInterface
{
    public function findById(int $id): ?ParametroSistema;

    public function paginate(int $perPage = 15, int $page = 1): ParametrosSistemaPage;

    public function save(ParametroSistema $parametroSistema): ParametroSistema;

    public function delete(int $id): bool;
}
