<?php

namespace App\Application\Usuario\Handlers;

use App\Application\Usuario\DTOs\UpdateUsuarioData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Usuario\Entities\Usuario;
use App\Domain\Usuario\Repositories\UsuarioRepositoryInterface;
use Illuminate\Support\Facades\Hash;

final class UpdateUsuarioHandler
{
    public function __construct(
        private UsuarioRepositoryInterface $usuarioRepository,
    ) {
    }

    public function handle(int $id, UpdateUsuarioData $data): Usuario
    {
        if ($this->usuarioRepository->findById($id) === null) {
            throw ResourceNotFoundException::usuario();
        }

        $passwordHash = $data->plainPassword !== null ? Hash::make($data->plainPassword) : null;

        $entity = new Usuario(
            $id,
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
            $passwordHash,
        );

        return $this->usuarioRepository->save($entity);
    }
}
