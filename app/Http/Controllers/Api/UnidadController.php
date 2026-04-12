<?php

namespace App\Http\Controllers\Api;

use App\Application\Unidad\DTOs\CreateUnidadData;
use App\Application\Unidad\DTOs\ListUnidadesData;
use App\Application\Unidad\DTOs\UpdateUnidadData;
use App\Application\Unidad\Handlers\CreateUnidadHandler;
use App\Application\Unidad\Handlers\DeleteUnidadHandler;
use App\Application\Unidad\Handlers\GetUnidadByIdHandler;
use App\Application\Unidad\Handlers\ListUnidadesHandler;
use App\Application\Unidad\Handlers\UpdateUnidadHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexUnidadRequest;
use App\Http\Requests\StoreUnidadRequest;
use App\Http\Requests\UpdateUnidadRequest;
use App\Http\Resources\UnidadResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class UnidadController extends Controller
{
    public function index(IndexUnidadRequest $request, ListUnidadesHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListUnidadesData::fromRequest($request->validated()));

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

        return UnidadResource::collection($paginator)->response();
    }

    public function store(StoreUnidadRequest $request, CreateUnidadHandler $handler): JsonResponse
    {
        $row = $handler->handle(CreateUnidadData::fromRequest($request->validated()));

        return (new UnidadResource($row))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetUnidadByIdHandler $handler): JsonResponse
    {
        return (new UnidadResource($handler->handle($id)))->response();
    }

    public function update(UpdateUnidadRequest $request, int $id, UpdateUnidadHandler $handler): JsonResponse
    {
        $row = $handler->handle($id, UpdateUnidadData::fromRequest($request->validated()));

        return (new UnidadResource($row))->response();
    }

    public function destroy(int $id, DeleteUnidadHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
