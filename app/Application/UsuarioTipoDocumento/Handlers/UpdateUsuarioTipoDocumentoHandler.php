<?php

namespace App\Application\UsuarioTipoDocumento\Handlers;

use App\Application\UsuarioTipoDocumento\DTOs\UpdateUsuarioTipoDocumentoData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\UsuarioTipoDocumento\Entities\UsuarioTipoDocumento;
use App\Domain\UsuarioTipoDocumento\Repositories\UsuarioTipoDocumentoRepositoryInterface;

final class UpdateUsuarioTipoDocumentoHandler
{
    public function __construct(
        private UsuarioTipoDocumentoRepositoryInterface $usuarioTipoDocumentoRepository,
    ) {
    }

    public function handle(int $id, UpdateUsuarioTipoDocumentoData $data): UsuarioTipoDocumento
    {
        if ($this->usuarioTipoDocumentoRepository->findById($id) === null) {
            throw ResourceNotFoundException::usuarioTipoDocumento();
        }

        $usuarioTipoDocumento = new UsuarioTipoDocumento(
            $id,
            $data->nombreTipodocu,
            $data->codigoTipodocu,
            $data->estadoTipodocu,
        );

        return $this->usuarioTipoDocumentoRepository->save($usuarioTipoDocumento);
    }
}
