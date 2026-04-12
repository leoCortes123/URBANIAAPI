<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\UnidadEstado\Entities\UnidadEstado;
use App\Domain\UnidadEstado\Repositories\UnidadEstadoRepositoryInterface;
use App\Domain\UnidadEstado\ValueObjects\UnidadEstadosPage;
use App\Models\TblUnidadesEstados;

final class EloquentUnidadEstadoRepository implements UnidadEstadoRepositoryInterface
{
    public function findById(int $id): ?UnidadEstado
    {
        $model = TblUnidadesEstados::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): UnidadEstadosPage
    {
        $paginator = TblUnidadesEstados::query()
            ->orderBy('orden_unidesta')
            ->orderBy('nombre_unidesta')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblUnidadesEstados $m) => $this->toDomain($m))
            ->all();

        return new UnidadEstadosPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(UnidadEstado $unidadEstado): UnidadEstado
    {
        if ($unidadEstado->id() === null) {
            $model = new TblUnidadesEstados;
            $this->applyDomainToModel($unidadEstado, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblUnidadesEstados::query()->find($unidadEstado->id());
        if ($model === null) {
            throw ResourceNotFoundException::unidadEstado();
        }

        $this->applyDomainToModel($unidadEstado, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblUnidadesEstados::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(UnidadEstado $unidadEstado, TblUnidadesEstados $model): void
    {
        $model->nombre_unidesta = $unidadEstado->nombreUnidesta();
        $model->codigo_unidesta = $unidadEstado->codigoUnidesta();
        $model->descripcion_unidesta = $unidadEstado->descripcionUnidesta();
        $model->estado_unidesta = $unidadEstado->estadoUnidesta();
        $model->orden_unidesta = $unidadEstado->ordenUnidesta();
    }

    private function toDomain(TblUnidadesEstados $model): UnidadEstado
    {
        return new UnidadEstado(
            $model->id,
            $model->nombre_unidesta,
            $model->codigo_unidesta,
            $model->descripcion_unidesta,
            $model->estado_unidesta,
            $model->orden_unidesta,
        );
    }
}
