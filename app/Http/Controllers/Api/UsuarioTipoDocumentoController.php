<?php

namespace App\Http\Controllers\Api;

use App\Application\UsuarioTipoDocumento\DTOs\CreateUsuarioTipoDocumentoData;
use App\Application\UsuarioTipoDocumento\DTOs\ListUsuarioTipoDocumentosData;
use App\Application\UsuarioTipoDocumento\DTOs\UpdateUsuarioTipoDocumentoData;
use App\Application\UsuarioTipoDocumento\Handlers\CreateUsuarioTipoDocumentoHandler;
use App\Application\UsuarioTipoDocumento\Handlers\DeleteUsuarioTipoDocumentoHandler;
use App\Application\UsuarioTipoDocumento\Handlers\GetUsuarioTipoDocumentoByIdHandler;
use App\Application\UsuarioTipoDocumento\Handlers\ListUsuarioTipoDocumentosHandler;
use App\Application\UsuarioTipoDocumento\Handlers\UpdateUsuarioTipoDocumentoHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexUsuarioTipoDocumentoRequest;
use App\Http\Requests\StoreUsuarioTipoDocumentoRequest;
use App\Http\Requests\UpdateUsuarioTipoDocumentoRequest;
use App\Http\Resources\UsuarioTipoDocumentoResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class UsuarioTipoDocumentoController extends Controller
{
    public function index(IndexUsuarioTipoDocumentoRequest $request, ListUsuarioTipoDocumentosHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListUsuarioTipoDocumentosData::fromRequest($request->validated()));

        $paginator = new LengthAwarePaginator(
            $page->items(),
            $page->total(),
            $page->perPage(),
            $page->currentPage(),
            [
                'path' => $request->url(),
                'query' => $request->query(),
            ],
        );

        return UsuarioTipoDocumentoResource::collection($paginator)->response();
    }

    public function store(StoreUsuarioTipoDocumentoRequest $request, CreateUsuarioTipoDocumentoHandler $handler): JsonResponse
    {
        $usuarioTipoDocumento = $handler->handle(CreateUsuarioTipoDocumentoData::fromRequest($request->validated()));

        return (new UsuarioTipoDocumentoResource($usuarioTipoDocumento))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetUsuarioTipoDocumentoByIdHandler $handler): JsonResponse
    {
        return (new UsuarioTipoDocumentoResource($handler->handle($id)))->response();
    }

    public function update(UpdateUsuarioTipoDocumentoRequest $request, int $id, UpdateUsuarioTipoDocumentoHandler $handler): JsonResponse
    {
        $usuarioTipoDocumento = $handler->handle($id, UpdateUsuarioTipoDocumentoData::fromRequest($request->validated()));

        return (new UsuarioTipoDocumentoResource($usuarioTipoDocumento))->response();
    }

    public function destroy(int $id, DeleteUsuarioTipoDocumentoHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
