<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\CategoriaConcepto\Entities\CategoriaConcepto;
use App\Domain\CategoriaConcepto\Repositories\CategoriaConceptoRepositoryInterface;
use App\Domain\CategoriaConcepto\ValueObjects\CategoriaConceptosPage;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Models\TblCategoriasConceptos;

final class EloquentCategoriaConceptoRepository implements CategoriaConceptoRepositoryInterface
{
    public function findById(int $id): ?CategoriaConcepto
    {
        $model = TblCategoriasConceptos::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): CategoriaConceptosPage
    {
        $paginator = TblCategoriasConceptos::query()
            ->orderBy('orden_catconc')
            ->orderBy('nombre_catconc')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblCategoriasConceptos $m) => $this->toDomain($m))
            ->all();

        return new CategoriaConceptosPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(CategoriaConcepto $categoriaConcepto): CategoriaConcepto
    {
        if ($categoriaConcepto->id() === null) {
            $model = new TblCategoriasConceptos;
            $this->applyDomainToModel($categoriaConcepto, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblCategoriasConceptos::query()->find($categoriaConcepto->id());
        if ($model === null) {
            throw ResourceNotFoundException::categoriaConcepto();
        }

        $this->applyDomainToModel($categoriaConcepto, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblCategoriasConceptos::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(CategoriaConcepto $categoriaConcepto, TblCategoriasConceptos $model): void
    {
        $model->nombre_catconc = $categoriaConcepto->nombreCatconc();
        $model->codigo_catconc = $categoriaConcepto->codigoCatconc();
        $model->descripcion_catconc = $categoriaConcepto->descripcionCatconc();
        $model->orden_catconc = $categoriaConcepto->ordenCatconc();
        $model->estado_catconc = $categoriaConcepto->estadoCatconc();
    }

    private function toDomain(TblCategoriasConceptos $model): CategoriaConcepto
    {
        return new CategoriaConcepto(
            $model->id,
            $model->nombre_catconc,
            $model->codigo_catconc,
            $model->descripcion_catconc,
            $model->orden_catconc,
            $model->estado_catconc,
        );
    }
}
