<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ParametroSistema\Entities\ParametroSistema;
use App\Domain\ParametroSistema\Repositories\ParametroSistemaRepositoryInterface;
use App\Domain\ParametroSistema\ValueObjects\ParametrosSistemaPage;
use App\Models\TblParametrosSistema;

final class EloquentParametroSistemaRepository implements ParametroSistemaRepositoryInterface
{
    public function findById(int $id): ?ParametroSistema
    {
        $model = TblParametrosSistema::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): ParametrosSistemaPage
    {
        $paginator = TblParametrosSistema::query()
            ->orderBy('codigo_param_sist')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblParametrosSistema $m) => $this->toDomain($m))
            ->all();

        return new ParametrosSistemaPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(ParametroSistema $parametroSistema): ParametroSistema
    {
        if ($parametroSistema->id() === null) {
            $model = new TblParametrosSistema;
            $this->applyDomainToModel($parametroSistema, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblParametrosSistema::query()->find($parametroSistema->id());
        if ($model === null) {
            throw ResourceNotFoundException::parametroSistema();
        }

        $this->applyDomainToModel($parametroSistema, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblParametrosSistema::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(ParametroSistema $d, TblParametrosSistema $model): void
    {
        $model->codigo_param_sist = $d->codigoParamSist();
        $model->nombre_param_sist = $d->nombreParamSist();
        $model->valor_param_sist = $d->valorParamSist();
        $model->tipo_dato_param_sist = $d->tipoDatoParamSist();
        $model->descripcion_param_sist = $d->descripcionParamSist();
        $model->editable_param_sist = $d->editableParamSist();
    }

    private function toDomain(TblParametrosSistema $model): ParametroSistema
    {
        return new ParametroSistema(
            $model->id,
            $model->codigo_param_sist,
            $model->nombre_param_sist,
            $model->valor_param_sist,
            $model->tipo_dato_param_sist,
            $model->descripcion_param_sist,
            $model->editable_param_sist,
        );
    }
}
