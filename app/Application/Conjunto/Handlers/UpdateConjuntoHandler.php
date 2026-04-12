<?php

namespace App\Application\Conjunto\Handlers;

use App\Application\Conjunto\DTOs\UpdateConjuntoData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Conjunto\Entities\Conjunto;
use App\Domain\Conjunto\Repositories\ConjuntoRepositoryInterface;

final class UpdateConjuntoHandler
{
    public function __construct(
        private ConjuntoRepositoryInterface $conjuntoRepository,
    ) {
    }

    public function handle(int $id, UpdateConjuntoData $data): Conjunto
    {
        if ($this->conjuntoRepository->findById($id) === null) {
            throw ResourceNotFoundException::conjunto();
        }

        $entity = new Conjunto(
            $id,
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
