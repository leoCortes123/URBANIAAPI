<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ConjuntoTipo\Entities\ConjuntoTipo;
use App\Domain\ConjuntoTipo\Repositories\ConjuntoTipoRepositoryInterface;
use App\Domain\ConjuntoTipo\ValueObjects\ConjuntoTiposPage;
use App\Models\TblConjuntosTipos;

final class EloquentConjuntoTipoRepository implements ConjuntoTipoRepositoryInterface
{
    public function findById(int $id): ?ConjuntoTipo
    {
        $model = TblConjuntosTipos::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): ConjuntoTiposPage
    {
        $paginator = TblConjuntosTipos::query()
            ->orderBy('nombre_tipoconj')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblConjuntosTipos $m) => $this->toDomain($m))
            ->all();

        return new ConjuntoTiposPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(ConjuntoTipo $conjuntoTipo): ConjuntoTipo
    {
        if ($conjuntoTipo->id() === null) {
            $model = new TblConjuntosTipos;
            $this->applyDomainToModel($conjuntoTipo, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblConjuntosTipos::query()->find($conjuntoTipo->id());
        if ($model === null) {
            throw ResourceNotFoundException::conjuntoTipo();
        }

        $this->applyDomainToModel($conjuntoTipo, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblConjuntosTipos::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(ConjuntoTipo $conjuntoTipo, TblConjuntosTipos $model): void
    {
        $model->nombre_tipoconj = $conjuntoTipo->nombreTipoconj();
        $model->descripcion_tipoconj = $conjuntoTipo->descripcionTipoconj();
        $model->estado_conest = $conjuntoTipo->estadoConest();
    }

    private function toDomain(TblConjuntosTipos $model): ConjuntoTipo
    {
        return new ConjuntoTipo(
            $model->id,
            $model->nombre_tipoconj,
            $model->descripcion_tipoconj,
            $model->estado_conest,
        );
    }
}
