<?php

namespace App\Domain\ConjuntoUsuario\Repositories;

use App\Domain\ConjuntoUsuario\Entities\ConjuntoUsuario;
use App\Domain\ConjuntoUsuario\ValueObjects\ConjuntosUsuariosPage;

interface ConjuntoUsuarioRepositoryInterface
{
    public function findById(int $id): ?ConjuntoUsuario;

    public function paginate(int $perPage = 15, int $page = 1): ConjuntosUsuariosPage;

    public function save(ConjuntoUsuario $conjuntoUsuario): ConjuntoUsuario;

    public function delete(int $id): bool;
}
