<?php

namespace App\Http\Controllers\Api;

use App\Application\UsuarioEstado\DTOs\CreateUsuarioEstadoData;
use App\Application\UsuarioEstado\DTOs\ListUsuarioEstadosData;
use App\Application\UsuarioEstado\DTOs\UpdateUsuarioEstadoData;
use App\Application\UsuarioEstado\Handlers\CreateUsuarioEstadoHandler;
use App\Application\UsuarioEstado\Handlers\DeleteUsuarioEstadoHandler;
use App\Application\UsuarioEstado\Handlers\GetUsuarioEstadoByIdHandler;
use App\Application\UsuarioEstado\Handlers\ListUsuarioEstadosHandler;
use App\Application\UsuarioEstado\Handlers\UpdateUsuarioEstadoHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexUsuarioEstadoRequest;
use App\Http\Requests\StoreUsuarioEstadoRequest;
use App\Http\Requests\UpdateUsuarioEstadoRequest;
use App\Http\Resources\UsuarioEstadoResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class UsuarioEstadoController extends Controller
{
    public function index(IndexUsuarioEstadoRequest $request, ListUsuarioEstadosHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListUsuarioEstadosData::fromRequest($request->validated()));

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

        return UsuarioEstadoResource::collection($paginator)->response();
    }

    public function store(StoreUsuarioEstadoRequest $request, CreateUsuarioEstadoHandler $handler): JsonResponse
    {
        $usuarioEstado = $handler->handle(CreateUsuarioEstadoData::fromRequest($request->validated()));

        return (new UsuarioEstadoResource($usuarioEstado))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetUsuarioEstadoByIdHandler $handler): JsonResponse
    {
        return (new UsuarioEstadoResource($handler->handle($id)))->response();
    }

    public function update(UpdateUsuarioEstadoRequest $request, int $id, UpdateUsuarioEstadoHandler $handler): JsonResponse
    {
        $usuarioEstado = $handler->handle($id, UpdateUsuarioEstadoData::fromRequest($request->validated()));

        return (new UsuarioEstadoResource($usuarioEstado))->response();
    }

    public function destroy(int $id, DeleteUsuarioEstadoHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
