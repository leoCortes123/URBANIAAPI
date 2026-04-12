<?php

namespace App\Http\Controllers\Api;

use App\Application\Bloque\DTOs\CreateBloqueData;
use App\Application\Bloque\DTOs\ListBloquesData;
use App\Application\Bloque\DTOs\UpdateBloqueData;
use App\Application\Bloque\Handlers\CreateBloqueHandler;
use App\Application\Bloque\Handlers\DeleteBloqueHandler;
use App\Application\Bloque\Handlers\GetBloqueByIdHandler;
use App\Application\Bloque\Handlers\ListBloquesHandler;
use App\Application\Bloque\Handlers\UpdateBloqueHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexBloqueRequest;
use App\Http\Requests\StoreBloqueRequest;
use App\Http\Requests\UpdateBloqueRequest;
use App\Http\Resources\BloqueResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class BloqueController extends Controller
{
    public function index(IndexBloqueRequest $request, ListBloquesHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListBloquesData::fromRequest($request->validated()));

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

        return BloqueResource::collection($paginator)->response();
    }

    public function store(StoreBloqueRequest $request, CreateBloqueHandler $handler): JsonResponse
    {
        $row = $handler->handle(CreateBloqueData::fromRequest($request->validated()));

        return (new BloqueResource($row))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetBloqueByIdHandler $handler): JsonResponse
    {
        return (new BloqueResource($handler->handle($id)))->response();
    }

    public function update(UpdateBloqueRequest $request, int $id, UpdateBloqueHandler $handler): JsonResponse
    {
        $row = $handler->handle($id, UpdateBloqueData::fromRequest($request->validated()));

        return (new BloqueResource($row))->response();
    }

    public function destroy(int $id, DeleteBloqueHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
