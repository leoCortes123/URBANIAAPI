<?php

namespace App\Http\Controllers\Api;

use App\Application\Conjunto\DTOs\CreateConjuntoData;
use App\Application\Conjunto\DTOs\ListConjuntosData;
use App\Application\Conjunto\DTOs\UpdateConjuntoData;
use App\Application\Conjunto\Handlers\CreateConjuntoHandler;
use App\Application\Conjunto\Handlers\DeleteConjuntoHandler;
use App\Application\Conjunto\Handlers\GetConjuntoByIdHandler;
use App\Application\Conjunto\Handlers\ListConjuntosHandler;
use App\Application\Conjunto\Handlers\UpdateConjuntoHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexConjuntoRequest;
use App\Http\Requests\StoreConjuntoRequest;
use App\Http\Requests\UpdateConjuntoRequest;
use App\Http\Resources\ConjuntoResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class ConjuntoController extends Controller
{
    public function index(IndexConjuntoRequest $request, ListConjuntosHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListConjuntosData::fromRequest($request->validated()));

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

        return ConjuntoResource::collection($paginator)->response();
    }

    public function store(StoreConjuntoRequest $request, CreateConjuntoHandler $handler): JsonResponse
    {
        $row = $handler->handle(CreateConjuntoData::fromRequest($request->validated()));

        return (new ConjuntoResource($row))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetConjuntoByIdHandler $handler): JsonResponse
    {
        return (new ConjuntoResource($handler->handle($id)))->response();
    }

    public function update(UpdateConjuntoRequest $request, int $id, UpdateConjuntoHandler $handler): JsonResponse
    {
        $row = $handler->handle($id, UpdateConjuntoData::fromRequest($request->validated()));

        return (new ConjuntoResource($row))->response();
    }

    public function destroy(int $id, DeleteConjuntoHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
