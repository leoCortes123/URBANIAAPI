<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Permiso\Entities\Permiso;
use App\Domain\Permiso\Repositories\PermisoRepositoryInterface;
use App\Domain\Permiso\ValueObjects\PermisosPage;
use App\Models\TblPermisos;

final class EloquentPermisoRepository implements PermisoRepositoryInterface
{
    public function findById(int $id): ?Permiso
    {
        $model = TblPermisos::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): PermisosPage
    {
        $paginator = TblPermisos::query()
            ->orderBy('nombre_permiso')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblPermisos $m) => $this->toDomain($m))
            ->all();

        return new PermisosPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(Permiso $permiso): Permiso
    {
        if ($permiso->id() === null) {
            $model = new TblPermisos;
            $this->applyDomainToModel($permiso, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblPermisos::query()->find($permiso->id());
        if ($model === null) {
            throw ResourceNotFoundException::permiso();
        }

        $this->applyDomainToModel($permiso, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblPermisos::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(Permiso $permiso, TblPermisos $model): void
    {
        $model->codigo_permiso = $permiso->codigoPermiso();
        $model->nombre_permiso = $permiso->nombrePermiso();
        $model->modulo_permiso = $permiso->moduloPermiso();
        $model->descripcion_permiso = $permiso->descripcionPermiso();
    }

    private function toDomain(TblPermisos $model): Permiso
    {
        return new Permiso(
            $model->id,
            $model->codigo_permiso,
            $model->nombre_permiso,
            $model->modulo_permiso,
            $model->descripcion_permiso,
        );
    }
}
