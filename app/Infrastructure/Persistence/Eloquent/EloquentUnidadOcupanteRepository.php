<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\UnidadOcupante\Entities\UnidadOcupante;
use App\Domain\UnidadOcupante\Repositories\UnidadOcupanteRepositoryInterface;
use App\Domain\UnidadOcupante\ValueObjects\UnidadesOcupantesPage;
use App\Models\TblUnidadesOcupantes;
use Carbon\Carbon;

final class EloquentUnidadOcupanteRepository implements UnidadOcupanteRepositoryInterface
{
    public function findById(int $id): ?UnidadOcupante
    {
        $model = TblUnidadesOcupantes::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): UnidadesOcupantesPage
    {
        $paginator = TblUnidadesOcupantes::query()
            ->orderBy('id')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblUnidadesOcupantes $m) => $this->toDomain($m))
            ->all();

        return new UnidadesOcupantesPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(UnidadOcupante $unidadOcupante): UnidadOcupante
    {
        if ($unidadOcupante->id() === null) {
            $model = new TblUnidadesOcupantes;
            $this->applyDomainToModel($unidadOcupante, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblUnidadesOcupantes::query()->find($unidadOcupante->id());
        if ($model === null) {
            throw ResourceNotFoundException::unidadOcupante();
        }

        $this->applyDomainToModel($unidadOcupante, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblUnidadesOcupantes::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(UnidadOcupante $u, TblUnidadesOcupantes $model): void
    {
        $model->tipo_ocupante = $u->tipoOcupante();
        $model->es_titular = $u->esTitular();
        $model->fecha_inicio = Carbon::parse($u->fechaInicio());
        $model->fecha_fin = $u->fechaFin() !== null ? Carbon::parse($u->fechaFin()) : null;
        $model->estado_ocupante = $u->estadoOcupante();
        $model->observaciones = $u->observaciones();
        $model->unidad_id = $u->unidadId();
        $model->user_id = $u->userId();
        $model->conjunto_id = $u->conjuntoId();
    }

    private function toDomain(TblUnidadesOcupantes $model): UnidadOcupante
    {
        return new UnidadOcupante(
            $model->id,
            $model->tipo_ocupante,
            $model->es_titular,
            $model->fecha_inicio->format('Y-m-d H:i:s'),
            $model->fecha_fin !== null ? $model->fecha_fin->format('Y-m-d H:i:s') : null,
            $model->estado_ocupante,
            $model->observaciones,
            (int) $model->unidad_id,
            (int) $model->user_id,
            (int) $model->conjunto_id,
        );
    }
}
