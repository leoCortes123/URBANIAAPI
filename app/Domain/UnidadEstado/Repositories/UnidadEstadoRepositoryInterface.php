<?php

namespace App\Domain\UnidadEstado\Repositories;

use App\Domain\UnidadEstado\Entities\UnidadEstado;
use App\Domain\UnidadEstado\ValueObjects\UnidadEstadosPage;

interface UnidadEstadoRepositoryInterface
{
    public function findById(int $id): ?UnidadEstado;

    public function paginate(int $perPage = 15, int $page = 1): UnidadEstadosPage;

    public function save(UnidadEstado $unidadEstado): UnidadEstado;

    public function delete(int $id): bool;
}
