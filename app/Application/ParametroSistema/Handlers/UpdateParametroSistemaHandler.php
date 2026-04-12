<?php

namespace App\Application\ParametroSistema\Handlers;

use App\Application\ParametroSistema\DTOs\UpdateParametroSistemaData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ParametroSistema\Entities\ParametroSistema;
use App\Domain\ParametroSistema\Repositories\ParametroSistemaRepositoryInterface;

final class UpdateParametroSistemaHandler
{
    public function __construct(
        private ParametroSistemaRepositoryInterface $repository,
    ) {
    }

    public function handle(int $id, UpdateParametroSistemaData $data): ParametroSistema
    {
        if ($this->repository->findById($id) === null) {
            throw ResourceNotFoundException::parametroSistema();
        }

        $entity = new ParametroSistema(
            $id,
            $data->codigoParamSist,
            $data->nombreParamSist,
            $data->valorParamSist,
            $data->tipoDatoParamSist,
            $data->descripcionParamSist,
            $data->editableParamSist,
        );

        return $this->repository->save($entity);
    }
}
