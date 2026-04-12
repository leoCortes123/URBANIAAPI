<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\Usuario\Entities\Usuario;
use App\Domain\Usuario\Repositories\UsuarioRepositoryInterface;
use App\Domain\Usuario\ValueObjects\UsuariosPage;
use App\Models\Users;
use Carbon\Carbon;

final class EloquentUsuarioRepository implements UsuarioRepositoryInterface
{
    public function findById(int $id): ?Usuario
    {
        $model = Users::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): UsuariosPage
    {
        $paginator = Users::query()
            ->orderBy('name')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (Users $m) => $this->toDomain($m))
            ->all();

        return new UsuariosPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(Usuario $usuario): Usuario
    {
        if ($usuario->id() === null) {
            $model = new Users;
            $this->applyDomainToModel($usuario, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = Users::query()->find($usuario->id());
        if ($model === null) {
            throw ResourceNotFoundException::usuario();
        }

        $this->applyDomainToModel($usuario, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        $model = Users::query()->find($id);
        if ($model === null) {
            return false;
        }

        $model->delete();

        return true;
    }

    private function applyDomainToModel(Usuario $u, Users $model): void
    {
        $model->name = $u->name();
        $model->email = $u->email();
        $model->documento = $u->documento();
        $model->telefono = $u->telefono();
        $model->foto_url = $u->fotoUrl();
        $model->estado = $u->estado();
        $model->ultimo_acceso = $u->ultimoAcceso() ? Carbon::instance($u->ultimoAcceso()) : null;
        $model->tipo_documento_id = $u->tipoDocumentoId();
        $model->rol_id = $u->rolId();
        $model->users_estado_id = $u->usersEstadoId();
        if ($u->passwordHash() !== null) {
            $model->password = $u->passwordHash();
        }
    }

    private function toDomain(Users $model): Usuario
    {
        $ultimo = null;
        if ($model->ultimo_acceso !== null) {
            $ultimo = \DateTimeImmutable::createFromMutable($model->ultimo_acceso);
        }

        return new Usuario(
            $model->id,
            $model->name,
            $model->email,
            $model->documento ?? '',
            $model->telefono,
            $model->foto_url,
            $model->estado,
            $ultimo,
            $model->tipo_documento_id !== null ? (int) $model->tipo_documento_id : null,
            $model->rol_id !== null ? (int) $model->rol_id : null,
            $model->users_estado_id !== null ? (int) $model->users_estado_id : null,
            null,
        );
    }
}
