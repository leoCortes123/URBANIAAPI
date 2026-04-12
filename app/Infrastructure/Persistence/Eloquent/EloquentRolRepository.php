<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Rol\Entities\Rol;
use App\Domain\Rol\Repositories\RolRepositoryInterface;
use App\Domain\Rol\ValueObjects\RolesPage;
use App\Models\TblRoles;

final class EloquentRolRepository implements RolRepositoryInterface
{
    public function findById(int $id): ?Rol
    {
        $model = TblRoles::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): RolesPage
    {
        $paginator = TblRoles::query()
            ->orderBy('nivel_rol')
            ->orderBy('nombre_rol')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblRoles $m) => $this->toDomain($m))
            ->all();

        return new RolesPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(Rol $rol): Rol
    {
        if ($rol->id() === null) {
            $model = new TblRoles;
            $this->applyDomainToModel($rol, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblRoles::query()->find($rol->id());
        if ($model === null) {
            throw ResourceNotFoundException::rol();
        }

        $this->applyDomainToModel($rol, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblRoles::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(Rol $rol, TblRoles $model): void
    {
        $model->nombre_rol = $rol->nombreRol();
        $model->codigo_rol = $rol->codigoRol();
        $model->descripcion_rol = $rol->descripcionRol();
        $model->nivel_rol = $rol->nivelRol();
        $model->estado_rol = $rol->estadoRol();
    }

    private function toDomain(TblRoles $model): Rol
    {
        return new Rol(
            $model->id,
            $model->nombre_rol,
            $model->codigo_rol,
            $model->descripcion_rol,
            $model->nivel_rol,
            $model->estado_rol,
        );
    }
}
