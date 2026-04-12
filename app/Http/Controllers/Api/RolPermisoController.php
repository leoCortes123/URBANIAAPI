<?php

namespace App\Http\Controllers\Api;

use App\Application\RolPermiso\DTOs\CreateRolPermisoData;
use App\Application\RolPermiso\DTOs\ListRolesPermisosData;
use App\Application\RolPermiso\DTOs\UpdateRolPermisoData;
use App\Application\RolPermiso\Handlers\CreateRolPermisoHandler;
use App\Application\RolPermiso\Handlers\DeleteRolPermisoHandler;
use App\Application\RolPermiso\Handlers\GetRolPermisoByIdHandler;
use App\Application\RolPermiso\Handlers\ListRolesPermisosHandler;
use App\Application\RolPermiso\Handlers\UpdateRolPermisoHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexRolPermisoRequest;
use App\Http\Requests\StoreRolPermisoRequest;
use App\Http\Requests\UpdateRolPermisoRequest;
use App\Http\Resources\RolPermisoResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class RolPermisoController extends Controller
{
    public function index(IndexRolPermisoRequest $request, ListRolesPermisosHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListRolesPermisosData::fromRequest($request->validated()));

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

        return RolPermisoResource::collection($paginator)->response();
    }

    public function store(StoreRolPermisoRequest $request, CreateRolPermisoHandler $handler): JsonResponse
    {
        $row = $handler->handle(CreateRolPermisoData::fromRequest($request->validated()));

        return (new RolPermisoResource($row))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetRolPermisoByIdHandler $handler): JsonResponse
    {
        return (new RolPermisoResource($handler->handle($id)))->response();
    }

    public function update(UpdateRolPermisoRequest $request, int $id, UpdateRolPermisoHandler $handler): JsonResponse
    {
        $row = $handler->handle($id, UpdateRolPermisoData::fromRequest($request->validated()));

        return (new RolPermisoResource($row))->response();
    }

    public function destroy(int $id, DeleteRolPermisoHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
