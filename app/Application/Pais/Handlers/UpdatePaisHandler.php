<?php

namespace App\Application\Pais\Handlers;

use App\Application\Pais\DTOs\UpdatePaisData;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Pais\Entities\Pais;
use App\Domain\Pais\Repositories\PaisRepositoryInterface;

final class UpdatePaisHandler
{
    public function __construct(
        private PaisRepositoryInterface $paisRepository,
    ) {
    }

    public function handle(int $id, UpdatePaisData $data): Pais
    {
        $existing = $this->paisRepository->findById($id);
        if ($existing === null) {
            throw ResourceNotFoundException::pais();
        }

        $pais = new Pais(
            $id,
            $data->codigoPais,
            $data->nombrePais,
            $data->codigoIsoPais,
            $data->estadoPais,
        );

        return $this->paisRepository->save($pais);
    }
}
