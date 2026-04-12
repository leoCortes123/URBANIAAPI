<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Unidad\Entities\Unidad;
use App\Domain\Unidad\Repositories\UnidadRepositoryInterface;
use App\Domain\Unidad\ValueObjects\UnidadesPage;
use App\Models\TblUnidades;

final class EloquentUnidadRepository implements UnidadRepositoryInterface
{
    public function findById(int $id): ?Unidad
    {
        $model = TblUnidades::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): UnidadesPage
    {
        $paginator = TblUnidades::query()
            ->orderBy('numero_unidad')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblUnidades $m) => $this->toDomain($m))
            ->all();

        return new UnidadesPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(Unidad $unidad): Unidad
    {
        if ($unidad->id() === null) {
            $model = new TblUnidades;
            $this->applyDomainToModel($unidad, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblUnidades::query()->find($unidad->id());
        if ($model === null) {
            throw ResourceNotFoundException::unidad();
        }

        $this->applyDomainToModel($unidad, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblUnidades::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(Unidad $u, TblUnidades $model): void
    {
        $model->numero_unidad = $u->numeroUnidad();
        $model->codigo_unidad = $u->codigoUnidad();
        $model->piso_unidad = $u->pisoUnidad();
        $model->area_m2_unidad = $u->areaM2Unidad();
        $model->coeficiente_unidad = $u->coeficienteUnidad();
        $model->estado_unidad = $u->estadoUnidad();
        $model->bloque_id = $u->bloqueId();
        $model->conjunto_id = $u->conjuntoId();
        $model->estado_ocupacion_id = $u->estadoOcupacionId();
    }

    private function toDomain(TblUnidades $model): Unidad
    {
        return new Unidad(
            $model->id,
            $model->numero_unidad,
            $model->codigo_unidad,
            $model->piso_unidad,
            $model->area_m2_unidad !== null ? (float) $model->area_m2_unidad : null,
            $model->coeficiente_unidad !== null ? (float) $model->coeficiente_unidad : null,
            $model->estado_unidad,
            (int) $model->bloque_id,
            (int) $model->conjunto_id,
            (int) $model->estado_ocupacion_id,
        );
    }
}
