<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ConceptoCobro\Entities\ConceptoCobro;
use App\Domain\ConceptoCobro\Repositories\ConceptoCobroRepositoryInterface;
use App\Domain\ConceptoCobro\ValueObjects\ConceptosCobroPage;
use App\Models\TblConceptosCobro;

final class EloquentConceptoCobroRepository implements ConceptoCobroRepositoryInterface
{
    public function findById(int $id): ?ConceptoCobro
    {
        $model = TblConceptosCobro::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): ConceptosCobroPage
    {
        $paginator = TblConceptosCobro::query()
            ->orderBy('nombre_concepto')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblConceptosCobro $m) => $this->toDomain($m))
            ->all();

        return new ConceptosCobroPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(ConceptoCobro $conceptoCobro): ConceptoCobro
    {
        if ($conceptoCobro->id() === null) {
            $model = new TblConceptosCobro;
            $this->applyDomainToModel($conceptoCobro, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblConceptosCobro::query()->find($conceptoCobro->id());
        if ($model === null) {
            throw ResourceNotFoundException::conceptoCobro();
        }

        $this->applyDomainToModel($conceptoCobro, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblConceptosCobro::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(ConceptoCobro $c, TblConceptosCobro $model): void
    {
        $model->categoria_concepto_id = $c->categoriaConceptoId();
        $model->codigo_concepto = $c->codigoConcepto();
        $model->nombre_concepto = $c->nombreConcepto();
        $model->descripcion_concepto = $c->descripcionConcepto();
        $model->valor_base_concepto = $c->valorBaseConcepto();
        $model->periodicidad_concepto = $c->periodicidadConcepto();
        $model->activo_concepto = $c->activoConcepto();
    }

    private function toDomain(TblConceptosCobro $model): ConceptoCobro
    {
        return new ConceptoCobro(
            $model->id,
            (int) $model->categoria_concepto_id,
            $model->codigo_concepto,
            $model->nombre_concepto,
            $model->descripcion_concepto,
            $model->valor_base_concepto !== null ? (string) $model->valor_base_concepto : null,
            $model->periodicidad_concepto,
            $model->activo_concepto,
        );
    }
}
