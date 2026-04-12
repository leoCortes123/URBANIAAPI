<?php

namespace App\Application\UsuarioTipoDocumento\Handlers;

use App\Application\UsuarioTipoDocumento\DTOs\CreateUsuarioTipoDocumentoData;
use App\Domain\UsuarioTipoDocumento\Entities\UsuarioTipoDocumento;
use App\Domain\UsuarioTipoDocumento\Repositories\UsuarioTipoDocumentoRepositoryInterface;

final class CreateUsuarioTipoDocumentoHandler
{
    public function __construct(
        private UsuarioTipoDocumentoRepositoryInterface $usuarioTipoDocumentoRepository,
    ) {
    }

    public function handle(CreateUsuarioTipoDocumentoData $data): UsuarioTipoDocumento
    {
        $usuarioTipoDocumento = new UsuarioTipoDocumento(
            null,
            $data->nombreTipodocu,
            $data->codigoTipodocu,
            $data->estadoTipodocu,
        );

        return $this->usuarioTipoDocumentoRepository->save($usuarioTipoDocumento);
    }
}
