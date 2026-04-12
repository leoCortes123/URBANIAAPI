<?php

namespace App\Application\UsuarioTipoDocumento\Handlers;

use App\Application\UsuarioTipoDocumento\DTOs\ListUsuarioTipoDocumentosData;
use App\Domain\UsuarioTipoDocumento\Repositories\UsuarioTipoDocumentoRepositoryInterface;
use App\Domain\UsuarioTipoDocumento\ValueObjects\UsuarioTipoDocumentosPage;

final class ListUsuarioTipoDocumentosHandler
{
    public function __construct(
        private UsuarioTipoDocumentoRepositoryInterface $usuarioTipoDocumentoRepository,
    ) {
    }

    public function handle(ListUsuarioTipoDocumentosData $data): UsuarioTipoDocumentosPage
    {
        return $this->usuarioTipoDocumentoRepository->paginate($data->perPage, $data->page);
    }
}
