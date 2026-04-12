<?php

namespace App\Http\Controllers\Api;

use App\Application\ConjuntoTipo\DTOs\CreateConjuntoTipoData;
use App\Application\ConjuntoTipo\DTOs\ListConjuntoTiposData;
use App\Application\ConjuntoTipo\DTOs\UpdateConjuntoTipoData;
use App\Application\ConjuntoTipo\Handlers\CreateConjuntoTipoHandler;
use App\Application\ConjuntoTipo\Handlers\DeleteConjuntoTipoHandler;
use App\Application\ConjuntoTipo\Handlers\GetConjuntoTipoByIdHandler;
use App\Application\ConjuntoTipo\Handlers\ListConjuntoTiposHandler;
use App\Application\ConjuntoTipo\Handlers\UpdateConjuntoTipoHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexConjuntoTipoRequest;
use App\Http\Requests\StoreConjuntoTipoRequest;
use App\Http\Requests\UpdateConjuntoTipoRequest;
use App\Http\Resources\ConjuntoTipoResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class ConjuntoTipoController extends Controller
{
    public function index(IndexConjuntoTipoRequest $request, ListConjuntoTiposHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListConjuntoTiposData::fromRequest($request->validated()));

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

        return ConjuntoTipoResource::collection($paginator)->response();
    }

    public function store(StoreConjuntoTipoRequest $request, CreateConjuntoTipoHandler $handler): JsonResponse
    {
        $conjuntoTipo = $handler->handle(CreateConjuntoTipoData::fromRequest($request->validated()));

        return (new ConjuntoTipoResource($conjuntoTipo))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetConjuntoTipoByIdHandler $handler): JsonResponse
    {
        return (new ConjuntoTipoResource($handler->handle($id)))->response();
    }

    public function update(UpdateConjuntoTipoRequest $request, int $id, UpdateConjuntoTipoHandler $handler): JsonResponse
    {
        $conjuntoTipo = $handler->handle($id, UpdateConjuntoTipoData::fromRequest($request->validated()));

        return (new ConjuntoTipoResource($conjuntoTipo))->response();
    }

    public function destroy(int $id, DeleteConjuntoTipoHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
