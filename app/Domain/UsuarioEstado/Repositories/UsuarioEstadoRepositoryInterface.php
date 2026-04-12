<?php

namespace App\Domain\UsuarioEstado\Repositories;

use App\Domain\UsuarioEstado\Entities\UsuarioEstado;
use App\Domain\UsuarioEstado\ValueObjects\UsuarioEstadosPage;

interface UsuarioEstadoRepositoryInterface
{
    public function findById(int $id): ?UsuarioEstado;

    public function paginate(int $perPage = 15, int $page = 1): UsuarioEstadosPage;

    public function save(UsuarioEstado $usuarioEstado): UsuarioEstado;

    public function delete(int $id): bool;
}
