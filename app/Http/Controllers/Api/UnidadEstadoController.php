<?php

namespace App\Http\Controllers\Api;

use App\Application\UnidadEstado\DTOs\CreateUnidadEstadoData;
use App\Application\UnidadEstado\DTOs\ListUnidadEstadosData;
use App\Application\UnidadEstado\DTOs\UpdateUnidadEstadoData;
use App\Application\UnidadEstado\Handlers\CreateUnidadEstadoHandler;
use App\Application\UnidadEstado\Handlers\DeleteUnidadEstadoHandler;
use App\Application\UnidadEstado\Handlers\GetUnidadEstadoByIdHandler;
use App\Application\UnidadEstado\Handlers\ListUnidadEstadosHandler;
use App\Application\UnidadEstado\Handlers\UpdateUnidadEstadoHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexUnidadEstadoRequest;
use App\Http\Requests\StoreUnidadEstadoRequest;
use App\Http\Requests\UpdateUnidadEstadoRequest;
use App\Http\Resources\UnidadEstadoResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class UnidadEstadoController extends Controller
{
    public function index(IndexUnidadEstadoRequest $request, ListUnidadEstadosHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListUnidadEstadosData::fromRequest($request->validated()));

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

        return UnidadEstadoResource::collection($paginator)->response();
    }

    public function store(StoreUnidadEstadoRequest $request, CreateUnidadEstadoHandler $handler): JsonResponse
    {
        $unidadEstado = $handler->handle(CreateUnidadEstadoData::fromRequest($request->validated()));

        return (new UnidadEstadoResource($unidadEstado))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetUnidadEstadoByIdHandler $handler): JsonResponse
    {
        return (new UnidadEstadoResource($handler->handle($id)))->response();
    }

    public function update(UpdateUnidadEstadoRequest $request, int $id, UpdateUnidadEstadoHandler $handler): JsonResponse
    {
        $unidadEstado = $handler->handle($id, UpdateUnidadEstadoData::fromRequest($request->validated()));

        return (new UnidadEstadoResource($unidadEstado))->response();
    }

    public function destroy(int $id, DeleteUnidadEstadoHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
