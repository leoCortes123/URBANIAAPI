<?php

namespace App\Http\Controllers\Api;

use App\Application\Rol\DTOs\CreateRolData;
use App\Application\Rol\DTOs\ListRolesData;
use App\Application\Rol\DTOs\UpdateRolData;
use App\Application\Rol\Handlers\CreateRolHandler;
use App\Application\Rol\Handlers\DeleteRolHandler;
use App\Application\Rol\Handlers\GetRolByIdHandler;
use App\Application\Rol\Handlers\ListRolesHandler;
use App\Application\Rol\Handlers\UpdateRolHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexRolRequest;
use App\Http\Requests\StoreRolRequest;
use App\Http\Requests\UpdateRolRequest;
use App\Http\Resources\RolResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class RolController extends Controller
{
    public function index(IndexRolRequest $request, ListRolesHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListRolesData::fromRequest($request->validated()));

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

        return RolResource::collection($paginator)->response();
    }

    public function store(StoreRolRequest $request, CreateRolHandler $handler): JsonResponse
    {
        $rol = $handler->handle(CreateRolData::fromRequest($request->validated()));

        return (new RolResource($rol))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetRolByIdHandler $handler): JsonResponse
    {
        return (new RolResource($handler->handle($id)))->response();
    }

    public function update(UpdateRolRequest $request, int $id, UpdateRolHandler $handler): JsonResponse
    {
        $rol = $handler->handle($id, UpdateRolData::fromRequest($request->validated()));

        return (new RolResource($rol))->response();
    }

    public function destroy(int $id, DeleteRolHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
