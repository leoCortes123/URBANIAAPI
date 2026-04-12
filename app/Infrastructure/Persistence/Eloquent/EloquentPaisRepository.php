<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Pais\Entities\Pais;
use App\Domain\Pais\Repositories\PaisRepositoryInterface;
use App\Domain\Pais\ValueObjects\PaisesPage;
use App\Models\TblPais;

final class EloquentPaisRepository implements PaisRepositoryInterface
{
    public function findById(int $id): ?Pais
    {
        $model = TblPais::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): PaisesPage
    {
        $paginator = TblPais::query()
            ->orderBy('nombre_pais')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblPais $m) => $this->toDomain($m))
            ->all();

        return new PaisesPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(Pais $pais): Pais
    {
        if ($pais->id() === null) {
            $model = new TblPais;
            $this->applyDomainToModel($pais, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblPais::query()->find($pais->id());
        if ($model === null) {
            throw ResourceNotFoundException::pais();
        }

        $this->applyDomainToModel($pais, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblPais::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(Pais $pais, TblPais $model): void
    {
        $model->codigo_pais = $pais->codigoPais();
        $model->nombre_pais = $pais->nombrePais();
        $model->codigo_iso_pais = $pais->codigoIsoPais();
        $model->estado_pais = $pais->estadoPais();
    }

    private function toDomain(TblPais $model): Pais
    {
        return new Pais(
            $model->id,
            $model->codigo_pais,
            $model->nombre_pais,
            $model->codigo_iso_pais,
            $model->estado_pais,
        );
    }
}
