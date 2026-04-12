<?php

namespace App\Application\UsuarioTipoDocumento\Handlers;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\UsuarioTipoDocumento\Entities\UsuarioTipoDocumento;
use App\Domain\UsuarioTipoDocumento\Repositories\UsuarioTipoDocumentoRepositoryInterface;

final class GetUsuarioTipoDocumentoByIdHandler
{
    public function __construct(
        private UsuarioTipoDocumentoRepositoryInterface $usuarioTipoDocumentoRepository,
    ) {
    }

    public function handle(int $id): UsuarioTipoDocumento
    {
        $usuarioTipoDocumento = $this->usuarioTipoDocumentoRepository->findById($id);
        if ($usuarioTipoDocumento === null) {
            throw ResourceNotFoundException::usuarioTipoDocumento();
        }

        return $usuarioTipoDocumento;
    }
}
