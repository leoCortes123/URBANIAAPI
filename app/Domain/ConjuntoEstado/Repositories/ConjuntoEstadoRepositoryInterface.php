<?php

namespace App\Domain\ConjuntoEstado\Repositories;

use App\Domain\ConjuntoEstado\Entities\ConjuntoEstado;
use App\Domain\ConjuntoEstado\ValueObjects\ConjuntoEstadosPage;

interface ConjuntoEstadoRepositoryInterface
{
    public function findById(int $id): ?ConjuntoEstado;

    public function paginate(int $perPage = 15, int $page = 1): ConjuntoEstadosPage;

    public function save(ConjuntoEstado $conjuntoEstado): ConjuntoEstado;

    public function delete(int $id): bool;
}
