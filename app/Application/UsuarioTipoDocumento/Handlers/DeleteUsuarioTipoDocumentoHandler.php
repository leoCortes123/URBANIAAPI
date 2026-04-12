<?php

namespace App\Application\UsuarioTipoDocumento\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\UsuarioTipoDocumento\Repositories\UsuarioTipoDocumentoRepositoryInterface;

final class DeleteUsuarioTipoDocumentoHandler
{
    public function __construct(
        private UsuarioTipoDocumentoRepositoryInterface $usuarioTipoDocumentoRepository,
    ) {
    }

    public function handle(int $id): void
    {
        if ($this->usuarioTipoDocumentoRepository->findById($id) === null) {
            throw ResourceNotFoundException::usuarioTipoDocumento();
        }

        $this->usuarioTipoDocumentoRepository->delete($id);
    }
}
