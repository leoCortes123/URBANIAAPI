<?php

namespace App\Application\Conjunto\Handlers;

use App\Application\Conjunto\DTOs\CreateConjuntoData;
use App\Domain\Conjunto\Entities\Conjunto;
use App\Domain\Conjunto\Repositories\ConjuntoRepositoryInterface;

final class CreateConjuntoHandler
{
    public function __construct(
        private ConjuntoRepositoryInterface $conjuntoRepository,
    ) {
    }

    public function handle(CreateConjuntoData $data): Conjunto
    {
        $entity = new Conjunto(
            null,
            $data->nombreConjunto,
            $data->nitConjunto,
            $data->direccionConjunto,
            $data->telefonoConjunto,
            $data->estratoConjunto,
            $data->coeficienteTotalConjunto,
            $data->datosBancariosConjunto,
            $data->reglamentoUrlConjunto,
            $data->logoUrlConjunto,
            $data->portadaUrlConjunto,
            $data->galeriaConjunto,
            $data->estadoConjunto,
            $data->conjuntoTipoId,
            $data->conjuntoEstadoId,
            $data->municipioId,
        );

        return $this->conjuntoRepository->save($entity);
    }
}
