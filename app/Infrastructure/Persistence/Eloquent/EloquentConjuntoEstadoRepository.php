<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ConjuntoEstado\Entities\ConjuntoEstado;
use App\Domain\ConjuntoEstado\Repositories\ConjuntoEstadoRepositoryInterface;
use App\Domain\ConjuntoEstado\ValueObjects\ConjuntoEstadosPage;
use App\Models\TblConjuntosEstados;

final class EloquentConjuntoEstadoRepository implements ConjuntoEstadoRepositoryInterface
{
    public function findById(int $id): ?ConjuntoEstado
    {
        $model = TblConjuntosEstados::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): ConjuntoEstadosPage
    {
        $paginator = TblConjuntosEstados::query()
            ->orderBy('orden_conjesta')
            ->orderBy('nombre_conjesta')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblConjuntosEstados $m) => $this->toDomain($m))
            ->all();

        return new ConjuntoEstadosPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(ConjuntoEstado $conjuntoEstado): ConjuntoEstado
    {
        if ($conjuntoEstado->id() === null) {
            $model = new TblConjuntosEstados;
            $this->applyDomainToModel($conjuntoEstado, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblConjuntosEstados::query()->find($conjuntoEstado->id());
        if ($model === null) {
            throw ResourceNotFoundException::conjuntoEstado();
        }

        $this->applyDomainToModel($conjuntoEstado, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblConjuntosEstados::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(ConjuntoEstado $conjuntoEstado, TblConjuntosEstados $model): void
    {
        $model->nombre_conjesta = $conjuntoEstado->nombreConjesta();
        $model->descripcion_conjesta = $conjuntoEstado->descripcionConjesta();
        $model->orden_conjesta = $conjuntoEstado->ordenConjesta();
        $model->estado_conjesta = $conjuntoEstado->estadoConjesta();
    }

    private function toDomain(TblConjuntosEstados $model): ConjuntoEstado
    {
        return new ConjuntoEstado(
            $model->id,
            $model->nombre_conjesta,
            $model->descripcion_conjesta,
            $model->orden_conjesta,
            $model->estado_conjesta,
        );
    }
}
