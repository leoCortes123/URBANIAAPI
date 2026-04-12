<?php

namespace App\Http\Controllers\Api;

use App\Application\ParametroSistema\DTOs\CreateParametroSistemaData;
use App\Application\ParametroSistema\DTOs\ListParametrosSistemaData;
use App\Application\ParametroSistema\DTOs\UpdateParametroSistemaData;
use App\Application\ParametroSistema\Handlers\CreateParametroSistemaHandler;
use App\Application\ParametroSistema\Handlers\DeleteParametroSistemaHandler;
use App\Application\ParametroSistema\Handlers\GetParametroSistemaByIdHandler;
use App\Application\ParametroSistema\Handlers\ListParametrosSistemaHandler;
use App\Application\ParametroSistema\Handlers\UpdateParametroSistemaHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexParametroSistemaRequest;
use App\Http\Requests\StoreParametroSistemaRequest;
use App\Http\Requests\UpdateParametroSistemaRequest;
use App\Http\Resources\ParametroSistemaResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class ParametroSistemaController extends Controller
{
    public function index(IndexParametroSistemaRequest $request, ListParametrosSistemaHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListParametrosSistemaData::fromRequest($request->validated()));

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

        return ParametroSistemaResource::collection($paginator)->response();
    }

    public function store(StoreParametroSistemaRequest $request, CreateParametroSistemaHandler $handler): JsonResponse
    {
        $row = $handler->handle(CreateParametroSistemaData::fromRequest($request->validated()));

        return (new ParametroSistemaResource($row))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetParametroSistemaByIdHandler $handler): JsonResponse
    {
        return (new ParametroSistemaResource($handler->handle($id)))->response();
    }

    public function update(UpdateParametroSistemaRequest $request, int $id, UpdateParametroSistemaHandler $handler): JsonResponse
    {
        $row = $handler->handle($id, UpdateParametroSistemaData::fromRequest($request->validated()));

        return (new ParametroSistemaResource($row))->response();
    }

    public function destroy(int $id, DeleteParametroSistemaHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
