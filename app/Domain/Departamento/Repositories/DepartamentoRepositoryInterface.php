<?php

namespace App\Domain\Departamento\Repositories;

use App\Domain\Departamento\Entities\Departamento;
use App\Domain\Departamento\ValueObjects\DepartamentosPage;

interface DepartamentoRepositoryInterface
{
    public function findById(int $id): ?Departamento;

    public function paginate(int $perPage = 15, int $page = 1): DepartamentosPage;

    public function save(Departamento $departamento): Departamento;

    public function delete(int $id): bool;
}
