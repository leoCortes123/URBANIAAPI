<?php

namespace App\Http\Controllers\Api;

use App\Application\UnidadOcupante\DTOs\CreateUnidadOcupanteData;
use App\Application\UnidadOcupante\DTOs\ListUnidadesOcupantesData;
use App\Application\UnidadOcupante\DTOs\UpdateUnidadOcupanteData;
use App\Application\UnidadOcupante\Handlers\CreateUnidadOcupanteHandler;
use App\Application\UnidadOcupante\Handlers\DeleteUnidadOcupanteHandler;
use App\Application\UnidadOcupante\Handlers\GetUnidadOcupanteByIdHandler;
use App\Application\UnidadOcupante\Handlers\ListUnidadesOcupantesHandler;
use App\Application\UnidadOcupante\Handlers\UpdateUnidadOcupanteHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexUnidadOcupanteRequest;
use App\Http\Requests\StoreUnidadOcupanteRequest;
use App\Http\Requests\UpdateUnidadOcupanteRequest;
use App\Http\Resources\UnidadOcupanteResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class UnidadOcupanteController extends Controller
{
    public function index(IndexUnidadOcupanteRequest $request, ListUnidadesOcupantesHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListUnidadesOcupantesData::fromRequest($request->validated()));

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

        return UnidadOcupanteResource::collection($paginator)->response();
    }

    public function store(StoreUnidadOcupanteRequest $request, CreateUnidadOcupanteHandler $handler): JsonResponse
    {
        $row = $handler->handle(CreateUnidadOcupanteData::fromRequest($request->validated()));

        return (new UnidadOcupanteResource($row))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetUnidadOcupanteByIdHandler $handler): JsonResponse
    {
        return (new UnidadOcupanteResource($handler->handle($id)))->response();
    }

    public function update(UpdateUnidadOcupanteRequest $request, int $id, UpdateUnidadOcupanteHandler $handler): JsonResponse
    {
        $row = $handler->handle($id, UpdateUnidadOcupanteData::fromRequest($request->validated()));

        return (new UnidadOcupanteResource($row))->response();
    }

    public function destroy(int $id, DeleteUnidadOcupanteHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
