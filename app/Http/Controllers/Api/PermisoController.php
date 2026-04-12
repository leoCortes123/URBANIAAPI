<?php

namespace App\Http\Controllers\Api;

use App\Application\Permiso\DTOs\CreatePermisoData;
use App\Application\Permiso\DTOs\ListPermisosData;
use App\Application\Permiso\DTOs\UpdatePermisoData;
use App\Application\Permiso\Handlers\CreatePermisoHandler;
use App\Application\Permiso\Handlers\DeletePermisoHandler;
use App\Application\Permiso\Handlers\GetPermisoByIdHandler;
use App\Application\Permiso\Handlers\ListPermisosHandler;
use App\Application\Permiso\Handlers\UpdatePermisoHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexPermisoRequest;
use App\Http\Requests\StorePermisoRequest;
use App\Http\Requests\UpdatePermisoRequest;
use App\Http\Resources\PermisoResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class PermisoController extends Controller
{
    public function index(IndexPermisoRequest $request, ListPermisosHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListPermisosData::fromRequest($request->validated()));

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

        return PermisoResource::collection($paginator)->response();
    }

    public function store(StorePermisoRequest $request, CreatePermisoHandler $handler): JsonResponse
    {
        $row = $handler->handle(CreatePermisoData::fromRequest($request->validated()));

        return (new PermisoResource($row))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetPermisoByIdHandler $handler): JsonResponse
    {
        return (new PermisoResource($handler->handle($id)))->response();
    }

    public function update(UpdatePermisoRequest $request, int $id, UpdatePermisoHandler $handler): JsonResponse
    {
        $row = $handler->handle($id, UpdatePermisoData::fromRequest($request->validated()));

        return (new PermisoResource($row))->response();
    }

    public function destroy(int $id, DeletePermisoHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
