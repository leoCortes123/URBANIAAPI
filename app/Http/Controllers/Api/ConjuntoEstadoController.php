<?php

namespace App\Http\Controllers\Api;

use App\Application\ConjuntoEstado\DTOs\CreateConjuntoEstadoData;
use App\Application\ConjuntoEstado\DTOs\ListConjuntoEstadosData;
use App\Application\ConjuntoEstado\DTOs\UpdateConjuntoEstadoData;
use App\Application\ConjuntoEstado\Handlers\CreateConjuntoEstadoHandler;
use App\Application\ConjuntoEstado\Handlers\DeleteConjuntoEstadoHandler;
use App\Application\ConjuntoEstado\Handlers\GetConjuntoEstadoByIdHandler;
use App\Application\ConjuntoEstado\Handlers\ListConjuntoEstadosHandler;
use App\Application\ConjuntoEstado\Handlers\UpdateConjuntoEstadoHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexConjuntoEstadoRequest;
use App\Http\Requests\StoreConjuntoEstadoRequest;
use App\Http\Requests\UpdateConjuntoEstadoRequest;
use App\Http\Resources\ConjuntoEstadoResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class ConjuntoEstadoController extends Controller
{
    public function index(IndexConjuntoEstadoRequest $request, ListConjuntoEstadosHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListConjuntoEstadosData::fromRequest($request->validated()));

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

        return ConjuntoEstadoResource::collection($paginator)->response();
    }

    public function store(StoreConjuntoEstadoRequest $request, CreateConjuntoEstadoHandler $handler): JsonResponse
    {
        $conjuntoEstado = $handler->handle(CreateConjuntoEstadoData::fromRequest($request->validated()));

        return (new ConjuntoEstadoResource($conjuntoEstado))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetConjuntoEstadoByIdHandler $handler): JsonResponse
    {
        return (new ConjuntoEstadoResource($handler->handle($id)))->response();
    }

    public function update(UpdateConjuntoEstadoRequest $request, int $id, UpdateConjuntoEstadoHandler $handler): JsonResponse
    {
        $conjuntoEstado = $handler->handle($id, UpdateConjuntoEstadoData::fromRequest($request->validated()));

        return (new ConjuntoEstadoResource($conjuntoEstado))->response();
    }

    public function destroy(int $id, DeleteConjuntoEstadoHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
