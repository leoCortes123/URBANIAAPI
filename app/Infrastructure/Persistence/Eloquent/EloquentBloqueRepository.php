<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Bloque\Entities\Bloque;
use App\Domain\Bloque\Repositories\BloqueRepositoryInterface;
use App\Domain\Bloque\ValueObjects\BloquesPage;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Models\TblBloques;

final class EloquentBloqueRepository implements BloqueRepositoryInterface
{
    public function findById(int $id): ?Bloque
    {
        $model = TblBloques::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): BloquesPage
    {
        $paginator = TblBloques::query()
            ->orderBy('nombre_bloque')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblBloques $m) => $this->toDomain($m))
            ->all();

        return new BloquesPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(Bloque $bloque): Bloque
    {
        if ($bloque->id() === null) {
            $model = new TblBloques;
            $this->applyDomainToModel($bloque, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblBloques::query()->find($bloque->id());
        if ($model === null) {
            throw ResourceNotFoundException::bloque();
        }

        $this->applyDomainToModel($bloque, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblBloques::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(Bloque $bloque, TblBloques $model): void
    {
        $model->nombre_bloque = $bloque->nombreBloque();
        $model->descripcion_bloque = $bloque->descripcionBloque();
        $model->numero_unidades_bloque = $bloque->numeroUnidadesBloque();
        $model->orden_bloque = $bloque->ordenBloque();
        $model->estado_bloque = $bloque->estadoBloque();
        $model->conjunto_id = $bloque->conjuntoId();
    }

    private function toDomain(TblBloques $model): Bloque
    {
        return new Bloque(
            $model->id,
            $model->nombre_bloque,
            $model->descripcion_bloque,
            $model->numero_unidades_bloque,
            $model->orden_bloque,
            $model->estado_bloque,
            (int) $model->conjunto_id,
        );
    }
}
