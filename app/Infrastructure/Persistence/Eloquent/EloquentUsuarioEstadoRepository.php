<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\UsuarioEstado\Entities\UsuarioEstado;
use App\Domain\UsuarioEstado\Repositories\UsuarioEstadoRepositoryInterface;
use App\Domain\UsuarioEstado\ValueObjects\UsuarioEstadosPage;
use App\Models\TblUsersEstados;

final class EloquentUsuarioEstadoRepository implements UsuarioEstadoRepositoryInterface
{
    public function findById(int $id): ?UsuarioEstado
    {
        $model = TblUsersEstados::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): UsuarioEstadosPage
    {
        $paginator = TblUsersEstados::query()
            ->orderBy('orden_useresta')
            ->orderBy('nombre_useresta')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblUsersEstados $m) => $this->toDomain($m))
            ->all();

        return new UsuarioEstadosPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(UsuarioEstado $usuarioEstado): UsuarioEstado
    {
        if ($usuarioEstado->id() === null) {
            $model = new TblUsersEstados;
            $this->applyDomainToModel($usuarioEstado, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblUsersEstados::query()->find($usuarioEstado->id());
        if ($model === null) {
            throw ResourceNotFoundException::usuarioEstado();
        }

        $this->applyDomainToModel($usuarioEstado, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblUsersEstados::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(UsuarioEstado $usuarioEstado, TblUsersEstados $model): void
    {
        $model->nombre_useresta = $usuarioEstado->nombreUseresta();
        $model->codigo_useresta = $usuarioEstado->codigoUseresta();
        $model->descripcion_useresta = $usuarioEstado->descripcionUseresta();
        $model->orden_useresta = $usuarioEstado->ordenUseresta();
        $model->estado_useresta = $usuarioEstado->estadoUseresta();
    }

    private function toDomain(TblUsersEstados $model): UsuarioEstado
    {
        return new UsuarioEstado(
            $model->id,
            $model->nombre_useresta,
            $model->codigo_useresta,
            $model->descripcion_useresta,
            $model->orden_useresta,
            $model->estado_useresta,
        );
    }
}
