<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Departamento\Entities\Departamento;
use App\Domain\Departamento\Repositories\DepartamentoRepositoryInterface;
use App\Domain\Departamento\ValueObjects\DepartamentosPage;
use App\Models\TblDepartamentos;

final class EloquentDepartamentoRepository implements DepartamentoRepositoryInterface
{
    public function findById(int $id): ?Departamento
    {
        $model = TblDepartamentos::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): DepartamentosPage
    {
        $paginator = TblDepartamentos::query()
            ->orderBy('nombre_departam')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblDepartamentos $m) => $this->toDomain($m))
            ->all();

        return new DepartamentosPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(Departamento $departamento): Departamento
    {
        if ($departamento->id() === null) {
            $model = new TblDepartamentos;
            $this->applyDomainToModel($departamento, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblDepartamentos::query()->find($departamento->id());
        if ($model === null) {
            throw ResourceNotFoundException::departamento();
        }

        $this->applyDomainToModel($departamento, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblDepartamentos::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(Departamento $departamento, TblDepartamentos $model): void
    {
        $model->codigo_dane_departam = $departamento->codigoDaneDepartam();
        $model->nombre_departam = $departamento->nombreDepartam();
        $model->estado_departam = $departamento->estadoDepartam();
        $model->pais_id = $departamento->paisId();
    }

    private function toDomain(TblDepartamentos $model): Departamento
    {
        return new Departamento(
            $model->id,
            $model->codigo_dane_departam,
            $model->nombre_departam,
            $model->estado_departam,
            (int) $model->pais_id,
        );
    }
}
