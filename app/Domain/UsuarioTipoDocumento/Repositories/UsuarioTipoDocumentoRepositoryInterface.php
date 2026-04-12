<?php

namespace App\Domain\UsuarioTipoDocumento\Repositories;

use App\Domain\UsuarioTipoDocumento\Entities\UsuarioTipoDocumento;
use App\Domain\UsuarioTipoDocumento\ValueObjects\UsuarioTipoDocumentosPage;

interface UsuarioTipoDocumentoRepositoryInterface
{
    public function findById(int $id): ?UsuarioTipoDocumento;

    public function paginate(int $perPage = 15, int $page = 1): UsuarioTipoDocumentosPage;

    public function save(UsuarioTipoDocumento $usuarioTipoDocumento): UsuarioTipoDocumento;

    public function delete(int $id): bool;
}
