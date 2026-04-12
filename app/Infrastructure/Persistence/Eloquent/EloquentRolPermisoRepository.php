<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\RolPermiso\Entities\RolPermiso;
use App\Domain\RolPermiso\Repositories\RolPermisoRepositoryInterface;
use App\Domain\RolPermiso\ValueObjects\RolesPermisosPage;
use App\Models\TblRolesPermisos;

final class EloquentRolPermisoRepository implements RolPermisoRepositoryInterface
{
    public function findById(int $id): ?RolPermiso
    {
        $model = TblRolesPermisos::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): RolesPermisosPage
    {
        $paginator = TblRolesPermisos::query()
            ->orderBy('id')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblRolesPermisos $m) => $this->toDomain($m))
            ->all();

        return new RolesPermisosPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(RolPermiso $rolPermiso): RolPermiso
    {
        if ($rolPermiso->id() === null) {
            $model = new TblRolesPermisos;
            $this->applyDomainToModel($rolPermiso, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblRolesPermisos::query()->find($rolPermiso->id());
        if ($model === null) {
            throw ResourceNotFoundException::rolPermiso();
        }

        $this->applyDomainToModel($rolPermiso, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblRolesPermisos::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(RolPermiso $r, TblRolesPermisos $model): void
    {
        $model->rol_id = $r->rolId();
        $model->permiso_id = $r->permisoId();
    }

    private function toDomain(TblRolesPermisos $model): RolPermiso
    {
        return new RolPermiso(
            $model->id,
            (int) $model->rol_id,
            (int) $model->permiso_id,
        );
    }
}
