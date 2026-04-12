<?php

namespace App\Http\Controllers\Api;

use App\Application\Usuario\DTOs\CreateUsuarioData;
use App\Application\Usuario\DTOs\ListUsuariosData;
use App\Application\Usuario\DTOs\UpdateUsuarioData;
use App\Application\Usuario\Handlers\CreateUsuarioHandler;
use App\Application\Usuario\Handlers\DeleteUsuarioHandler;
use App\Application\Usuario\Handlers\GetUsuarioByIdHandler;
use App\Application\Usuario\Handlers\ListUsuariosHandler;
use App\Application\Usuario\Handlers\UpdateUsuarioHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexUsuarioRequest;
use App\Http\Requests\StoreUsuarioRequest;
use App\Http\Requests\UpdateUsuarioRequest;
use App\Http\Resources\UsuarioResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class UsuarioController extends Controller
{
    public function index(IndexUsuarioRequest $request, ListUsuariosHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListUsuariosData::fromRequest($request->validated()));

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

        return UsuarioResource::collection($paginator)->response();
    }

    public function store(StoreUsuarioRequest $request, CreateUsuarioHandler $handler): JsonResponse
    {
        $row = $handler->handle(CreateUsuarioData::fromRequest($request->validated()));

        return (new UsuarioResource($row))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetUsuarioByIdHandler $handler): JsonResponse
    {
        return (new UsuarioResource($handler->handle($id)))->response();
    }

    public function update(UpdateUsuarioRequest $request, int $id, UpdateUsuarioHandler $handler): JsonResponse
    {
        $row = $handler->handle($id, UpdateUsuarioData::fromRequest($request->validated()));

        return (new UsuarioResource($row))->response();
    }

    public function destroy(int $id, DeleteUsuarioHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
