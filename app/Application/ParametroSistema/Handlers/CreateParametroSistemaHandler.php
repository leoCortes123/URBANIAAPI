<?php

namespace App\Application\ParametroSistema\Handlers;

use App\Application\ParametroSistema\DTOs\CreateParametroSistemaData;
use App\Domain\ParametroSistema\Entities\ParametroSistema;
use App\Domain\ParametroSistema\Repositories\ParametroSistemaRepositoryInterface;

final class CreateParametroSistemaHandler
{
    public function __construct(
        private ParametroSistemaRepositoryInterface $repository,
    ) {
    }

    public function handle(CreateParametroSistemaData $data): ParametroSistema
    {
        $entity = new ParametroSistema(
            null,
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
