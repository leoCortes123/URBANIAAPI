<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Municipio\Entities\Municipio;
use App\Domain\Municipio\Repositories\MunicipioRepositoryInterface;
use App\Domain\Municipio\ValueObjects\MunicipiosPage;
use App\Models\TblMunicipios;

final class EloquentMunicipioRepository implements MunicipioRepositoryInterface
{
    public function findById(int $id): ?Municipio
    {
        $model = TblMunicipios::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): MunicipiosPage
    {
        $paginator = TblMunicipios::query()
            ->orderBy('nombre_municipi')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblMunicipios $m) => $this->toDomain($m))
            ->all();

        return new MunicipiosPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(Municipio $municipio): Municipio
    {
        if ($municipio->id() === null) {
            $model = new TblMunicipios;
            $this->applyDomainToModel($municipio, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblMunicipios::query()->find($municipio->id());
        if ($model === null) {
            throw ResourceNotFoundException::municipio();
        }

        $this->applyDomainToModel($municipio, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblMunicipios::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(Municipio $municipio, TblMunicipios $model): void
    {
        $model->codigo_dane_municipi = $municipio->codigoDaneMunicipi();
        $model->nombre_municipi = $municipio->nombreMunicipi();
        $model->estado_municipi = $municipio->estadoMunicipi();
        $model->departamento_id = $municipio->departamentoId();
    }

    private function toDomain(TblMunicipios $model): Municipio
    {
        return new Municipio(
            $model->id,
            $model->codigo_dane_municipi,
            $model->nombre_municipi,
            $model->estado_municipi,
            (int) $model->departamento_id,
        );
    }
}
