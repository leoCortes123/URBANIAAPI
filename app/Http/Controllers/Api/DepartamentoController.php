<?php

namespace App\Http\Controllers\Api;

use App\Application\Departamento\DTOs\CreateDepartamentoData;
use App\Application\Departamento\DTOs\ListDepartamentosData;
use App\Application\Departamento\DTOs\UpdateDepartamentoData;
use App\Application\Departamento\Handlers\CreateDepartamentoHandler;
use App\Application\Departamento\Handlers\DeleteDepartamentoHandler;
use App\Application\Departamento\Handlers\GetDepartamentoByIdHandler;
use App\Application\Departamento\Handlers\ListDepartamentosHandler;
use App\Application\Departamento\Handlers\UpdateDepartamentoHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexDepartamentoRequest;
use App\Http\Requests\StoreDepartamentoRequest;
use App\Http\Requests\UpdateDepartamentoRequest;
use App\Http\Resources\DepartamentoResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class DepartamentoController extends Controller
{
    public function index(IndexDepartamentoRequest $request, ListDepartamentosHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListDepartamentosData::fromRequest($request->validated()));

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

        return DepartamentoResource::collection($paginator)->response();
    }

    public function store(StoreDepartamentoRequest $request, CreateDepartamentoHandler $handler): JsonResponse
    {
        $row = $handler->handle(CreateDepartamentoData::fromRequest($request->validated()));

        return (new DepartamentoResource($row))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetDepartamentoByIdHandler $handler): JsonResponse
    {
        return (new DepartamentoResource($handler->handle($id)))->response();
    }

    public function update(UpdateDepartamentoRequest $request, int $id, UpdateDepartamentoHandler $handler): JsonResponse
    {
        $row = $handler->handle($id, UpdateDepartamentoData::fromRequest($request->validated()));

        return (new DepartamentoResource($row))->response();
    }

    public function destroy(int $id, DeleteDepartamentoHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
