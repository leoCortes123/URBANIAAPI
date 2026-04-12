<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Conjunto\Entities\Conjunto;
use App\Domain\Conjunto\Repositories\ConjuntoRepositoryInterface;
use App\Domain\Conjunto\ValueObjects\ConjuntosPage;
use App\Models\TblConjuntos;

final class EloquentConjuntoRepository implements ConjuntoRepositoryInterface
{
    public function findById(int $id): ?Conjunto
    {
        $model = TblConjuntos::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): ConjuntosPage
    {
        $paginator = TblConjuntos::query()
            ->orderBy('nombre_conjunto')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblConjuntos $m) => $this->toDomain($m))
            ->all();

        return new ConjuntosPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(Conjunto $conjunto): Conjunto
    {
        if ($conjunto->id() === null) {
            $model = new TblConjuntos;
            $this->applyDomainToModel($conjunto, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblConjuntos::query()->find($conjunto->id());
        if ($model === null) {
            throw ResourceNotFoundException::conjunto();
        }

        $this->applyDomainToModel($conjunto, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblConjuntos::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(Conjunto $c, TblConjuntos $model): void
    {
        $model->nombre_conjunto = $c->nombreConjunto();
        $model->nit_conjunto = $c->nitConjunto();
        $model->direccion_conjunto = $c->direccionConjunto();
        $model->telefono_conjunto = $c->telefonoConjunto();
        $model->estrato_conjunto = $c->estratoConjunto();
        $model->coeficiente_total_conjunto = $c->coeficienteTotalConjunto();
        $model->datos_bancarios_conjunto = $c->datosBancariosConjunto();
        $model->reglamento_url_conjunto = $c->reglamentoUrlConjunto();
        $model->logo_url_conjunto = $c->logoUrlConjunto();
        $model->portada_url_conjunto = $c->portadaUrlConjunto();
        $model->galeria_conjunto = $c->galeriaConjunto();
        $model->estado_conjunto = $c->estadoConjunto();
        $model->conjunto_tipo_id = $c->conjuntoTipoId();
        $model->conjunto_estado_id = $c->conjuntoEstadoId();
        $model->municipio_id = $c->municipioId();
    }

    private function toDomain(TblConjuntos $model): Conjunto
    {
        return new Conjunto(
            $model->id,
            $model->nombre_conjunto,
            $model->nit_conjunto,
            $model->direccion_conjunto,
            $model->telefono_conjunto,
            $model->estrato_conjunto,
            $model->coeficiente_total_conjunto !== null ? (float) $model->coeficiente_total_conjunto : null,
            $model->datos_bancarios_conjunto !== null ? (string) $model->datos_bancarios_conjunto : null,
            $model->reglamento_url_conjunto,
            $model->logo_url_conjunto,
            $model->portada_url_conjunto,
            $model->galeria_conjunto !== null ? (string) $model->galeria_conjunto : null,
            $model->estado_conjunto,
            (int) $model->conjunto_tipo_id,
            (int) $model->conjunto_estado_id,
            (int) $model->municipio_id,
        );
    }
}
