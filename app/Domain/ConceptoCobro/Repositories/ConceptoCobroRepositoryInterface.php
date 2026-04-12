<?php

namespace App\Domain\ConceptoCobro\Repositories;

use App\Domain\ConceptoCobro\Entities\ConceptoCobro;
use App\Domain\ConceptoCobro\ValueObjects\ConceptosCobroPage;

interface ConceptoCobroRepositoryInterface
{
    public function findById(int $id): ?ConceptoCobro;

    public function paginate(int $perPage = 15, int $page = 1): ConceptosCobroPage;

    public function save(ConceptoCobro $conceptoCobro): ConceptoCobro;

    public function delete(int $id): bool;
}
