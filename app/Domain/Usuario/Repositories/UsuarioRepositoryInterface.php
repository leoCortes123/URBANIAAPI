<?php

namespace App\Domain\Usuario\Repositories;

use App\Domain\Usuario\Entities\Usuario;
use App\Domain\Usuario\ValueObjects\UsuariosPage;

interface UsuarioRepositoryInterface
{
    public function findById(int $id): ?Usuario;

    public function paginate(int $perPage = 15, int $page = 1): UsuariosPage;

    public function save(Usuario $usuario): Usuario;

    public function delete(int $id): bool;
}
