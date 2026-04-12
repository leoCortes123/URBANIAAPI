<?php

namespace App\Domain\CategoriaConcepto\Repositories;

use App\Domain\CategoriaConcepto\Entities\CategoriaConcepto;
use App\Domain\CategoriaConcepto\ValueObjects\CategoriaConceptosPage;

interface CategoriaConceptoRepositoryInterface
{
    public function findById(int $id): ?CategoriaConcepto;

    public function paginate(int $perPage = 15, int $page = 1): CategoriaConceptosPage;

    public function save(CategoriaConcepto $categoriaConcepto): CategoriaConcepto;

    public function delete(int $id): bool;
}
