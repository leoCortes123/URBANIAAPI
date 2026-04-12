<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ParametroConjunto\Entities\ParametroConjunto;
use App\Domain\ParametroConjunto\Repositories\ParametroConjuntoRepositoryInterface;
use App\Domain\ParametroConjunto\ValueObjects\ParametrosConjuntoPage;
use App\Models\TblParametrosConjunto;

final class EloquentParametroConjuntoRepository implements ParametroConjuntoRepositoryInterface
{
    public function findById(int $id): ?ParametroConjunto
    {
        $model = TblParametrosConjunto::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): ParametrosConjuntoPage
    {
        $paginator = TblParametrosConjunto::query()
            ->orderBy('id')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblParametrosConjunto $m) => $this->toDomain($m))
            ->all();

        return new ParametrosConjuntoPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(ParametroConjunto $parametroConjunto): ParametroConjunto
    {
        if ($parametroConjunto->id() === null) {
            $model = new TblParametrosConjunto;
            $this->applyDomainToModel($parametroConjunto, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblParametrosConjunto::query()->find($parametroConjunto->id());
        if ($model === null) {
            throw ResourceNotFoundException::parametroConjunto();
        }

        $this->applyDomainToModel($parametroConjunto, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblParametrosConjunto::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(ParametroConjunto $d, TblParametrosConjunto $model): void
    {
        $model->parametro_sistema_id = $d->parametroSistemaId();
        $model->conjunto_id = $d->conjuntoId();
        $model->valor_param_conjunto = $d->valorParamConjunto();
    }

    private function toDomain(TblParametrosConjunto $model): ParametroConjunto
    {
        return new ParametroConjunto(
            $model->id,
            (int) $model->parametro_sistema_id,
            (int) $model->conjunto_id,
            $model->valor_param_conjunto,
        );
    }
}
