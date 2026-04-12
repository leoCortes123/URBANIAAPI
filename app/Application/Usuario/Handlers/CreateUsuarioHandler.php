<?php

namespace App\Application\Usuario\Handlers;

use App\Application\Usuario\DTOs\CreateUsuarioData;
use App\Domain\Usuario\Entities\Usuario;
use App\Domain\Usuario\Repositories\UsuarioRepositoryInterface;
use Illuminate\Support\Facades\Hash;

final class CreateUsuarioHandler
{
    public function __construct(
        private UsuarioRepositoryInterface $usuarioRepository,
    ) {
    }

    public function handle(CreateUsuarioData $data): Usuario
    {
        $entity = new Usuario(
            null,
            $data->name,
            $data->email,
            $data->documento,
            $data->telefono,
            $data->fotoUrl,
            $data->estado,
            $data->ultimoAcceso,
            $data->tipoDocumentoId,
            $data->rolId,
            $data->usersEstadoId,
            Hash::make($data->plainPassword),
        );

        return $this->usuarioRepository->save($entity);
    }
}
