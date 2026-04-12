<?php

namespace App\Http\Controllers\Api;

use App\Application\ConjuntoUsuario\DTOs\CreateConjuntoUsuarioData;
use App\Application\ConjuntoUsuario\DTOs\ListConjuntosUsuariosData;
use App\Application\ConjuntoUsuario\DTOs\UpdateConjuntoUsuarioData;
use App\Application\ConjuntoUsuario\Handlers\CreateConjuntoUsuarioHandler;
use App\Application\ConjuntoUsuario\Handlers\DeleteConjuntoUsuarioHandler;
use App\Application\ConjuntoUsuario\Handlers\GetConjuntoUsuarioByIdHandler;
use App\Application\ConjuntoUsuario\Handlers\ListConjuntosUsuariosHandler;
use App\Application\ConjuntoUsuario\Handlers\UpdateConjuntoUsuarioHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexConjuntoUsuarioRequest;
use App\Http\Requests\StoreConjuntoUsuarioRequest;
use App\Http\Requests\UpdateConjuntoUsuarioRequest;
use App\Http\Resources\ConjuntoUsuarioResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class ConjuntoUsuarioController extends Controller
{
    public function index(IndexConjuntoUsuarioRequest $request, ListConjuntosUsuariosHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListConjuntosUsuariosData::fromRequest($request->validated()));

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

        return ConjuntoUsuarioResource::collection($paginator)->response();
    }

    public function store(StoreConjuntoUsuarioRequest $request, CreateConjuntoUsuarioHandler $handler): JsonResponse
    {
        $row = $handler->handle(CreateConjuntoUsuarioData::fromRequest($request->validated()));

        return (new ConjuntoUsuarioResource($row))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetConjuntoUsuarioByIdHandler $handler): JsonResponse
    {
        return (new ConjuntoUsuarioResource($handler->handle($id)))->response();
    }

    public function update(UpdateConjuntoUsuarioRequest $request, int $id, UpdateConjuntoUsuarioHandler $handler): JsonResponse
    {
        $row = $handler->handle($id, UpdateConjuntoUsuarioData::fromRequest($request->validated()));

        return (new ConjuntoUsuarioResource($row))->response();
    }

    public function destroy(int $id, DeleteConjuntoUsuarioHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
