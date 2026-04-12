<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Common\Exceptions\ResourceNotFoundException;
use App\Domain\UsuarioTipoDocumento\Entities\UsuarioTipoDocumento;
use App\Domain\UsuarioTipoDocumento\Repositories\UsuarioTipoDocumentoRepositoryInterface;
use App\Domain\UsuarioTipoDocumento\ValueObjects\UsuarioTipoDocumentosPage;
use App\Models\TblUsersTiposDocumentos;

final class EloquentUsuarioTipoDocumentoRepository implements UsuarioTipoDocumentoRepositoryInterface
{
    public function findById(int $id): ?UsuarioTipoDocumento
    {
        $model = TblUsersTiposDocumentos::query()->find($id);

        return $model ? $this->toDomain($model) : null;
    }

    public function paginate(int $perPage = 15, int $page = 1): UsuarioTipoDocumentosPage
    {
        $paginator = TblUsersTiposDocumentos::query()
            ->orderBy('nombre_tipodocu')
            ->paginate($perPage, ['*'], 'page', $page);

        $items = $paginator->getCollection()
            ->map(fn (TblUsersTiposDocumentos $m) => $this->toDomain($m))
            ->all();

        return new UsuarioTipoDocumentosPage(
            $items,
            $paginator->total(),
            $paginator->perPage(),
            $paginator->currentPage(),
        );
    }

    public function save(UsuarioTipoDocumento $usuarioTipoDocumento): UsuarioTipoDocumento
    {
        if ($usuarioTipoDocumento->id() === null) {
            $model = new TblUsersTiposDocumentos;
            $this->applyDomainToModel($usuarioTipoDocumento, $model);
            $model->save();

            return $this->toDomain($model->fresh());
        }

        $model = TblUsersTiposDocumentos::query()->find($usuarioTipoDocumento->id());
        if ($model === null) {
            throw ResourceNotFoundException::usuarioTipoDocumento();
        }

        $this->applyDomainToModel($usuarioTipoDocumento, $model);
        $model->save();

        return $this->toDomain($model->fresh());
    }

    public function delete(int $id): bool
    {
        return (bool) TblUsersTiposDocumentos::query()->whereKey($id)->delete();
    }

    private function applyDomainToModel(UsuarioTipoDocumento $usuarioTipoDocumento, TblUsersTiposDocumentos $model): void
    {
        $model->nombre_tipodocu = $usuarioTipoDocumento->nombreTipodocu();
        $model->codigo_tipodocu = $usuarioTipoDocumento->codigoTipodocu();
        $model->estado_tipodocu = $usuarioTipoDocumento->estadoTipodocu();
    }

    private function toDomain(TblUsersTiposDocumentos $model): UsuarioTipoDocumento
    {
        return new UsuarioTipoDocumento(
            $model->id,
            $model->nombre_tipodocu,
            $model->codigo_tipodocu,
            $model->estado_tipodocu,
        );
    }
}
