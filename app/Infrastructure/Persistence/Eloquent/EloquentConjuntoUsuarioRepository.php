<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\ConjuntoUsuario\Entities\ConjuntoUsuario;
use App\Domain\ConjuntoUsuario\Repositories\ConjuntoUsuarioRepositoryInterface;
use App\Domain\ConjuntoUsuario\ValueObjects\ConjuntosUsuariosPage;
use App\Models\TblConjuntoUser;
use Carbon\Carbon;

final class EloquentConjuntoUsuarioRepository implements ConjuntoUsuarioRepositoryInterface
{
    public function findById(int $id): ?ConjuntoUsuario
    {
        $model = TblConjuntoUser::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): ConjuntosUsuariosPage
    {
        $paginator = TblConjuntoUser::query()
            ->orderBy('id')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblConjuntoUser $m) => $this->toDomain($m))
            ->all();

        return new ConjuntosUsuariosPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(ConjuntoUsuario $conjuntoUsuario): ConjuntoUsuario
    {
        if ($conjuntoUsuario->id() === null) {
            $model = new TblConjuntoUser;
            $this->applyDomainToModel($conjuntoUsuario, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblConjuntoUser::query()->find($conjuntoUsuario->id());
        if ($model === null) {
            throw ResourceNotFoundException::conjuntoUsuario();
        }

        $this->applyDomainToModel($conjuntoUsuario, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblConjuntoUser::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(ConjuntoUsuario $c, TblConjuntoUser $model): void
    {
        $model->user_id = $c->userId();
        $model->conjunto_id = $c->conjuntoId();
        $model->fecha_vinculacion = $c->fechaVinculacion() !== null ? Carbon::parse($c->fechaVinculacion()) : null;
        $model->estado_conjuser = $c->estadoConjuser();
    }

    private function toDomain(TblConjuntoUser $model): ConjuntoUsuario
    {
        $fecha = $model->fecha_vinculacion !== null ? $model->fecha_vinculacion->format('Y-m-d H:i:s') : null;

        return new ConjuntoUsuario(
            $model->id,
            (int) $model->user_id,
            (int) $model->conjunto_id,
            $fecha,
            $model->estado_conjuser,
        );
    }
}
