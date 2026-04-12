<?php

namespace App\Http\Controllers\Api;

use App\Application\Pais\DTOs\CreatePaisData;
use App\Application\Pais\DTOs\ListPaisesData;
use App\Application\Pais\DTOs\UpdatePaisData;
use App\Application\Pais\Handlers\CreatePaisHandler;
use App\Application\Pais\Handlers\DeletePaisHandler;
use App\Application\Pais\Handlers\GetPaisByIdHandler;
use App\Application\Pais\Handlers\ListPaisesHandler;
use App\Application\Pais\Handlers\UpdatePaisHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexPaisRequest;
use App\Http\Requests\StorePaisRequest;
use App\Http\Requests\UpdatePaisRequest;
use App\Http\Resources\PaisResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class PaisController extends Controller
{
    public function index(IndexPaisRequest $request, ListPaisesHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListPaisesData::fromRequest($request->validated()));

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

        return PaisResource::collection($paginator)->response();
    }

    public function store(StorePaisRequest $request, CreatePaisHandler $handler): JsonResponse
    {
        $pais = $handler->handle(CreatePaisData::fromRequest($request->validated()));

        return (new PaisResource($pais))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetPaisByIdHandler $handler): JsonResponse
    {
        return (new PaisResource($handler->handle($id)))->response();
    }

    public function update(UpdatePaisRequest $request, int $id, UpdatePaisHandler $handler): JsonResponse
    {
        $pais = $handler->handle($id, UpdatePaisData::fromRequest($request->validated()));

        return (new PaisResource($pais))->response();
    }

    public function destroy(int $id, DeletePaisHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
