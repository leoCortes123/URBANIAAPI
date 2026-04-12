<?php

namespace App\Http\Controllers\Api;

use App\Application\ParametroConjunto\DTOs\CreateParametroConjuntoData;
use App\Application\ParametroConjunto\DTOs\ListParametrosConjuntoData;
use App\Application\ParametroConjunto\DTOs\UpdateParametroConjuntoData;
use App\Application\ParametroConjunto\Handlers\CreateParametroConjuntoHandler;
use App\Application\ParametroConjunto\Handlers\DeleteParametroConjuntoHandler;
use App\Application\ParametroConjunto\Handlers\GetParametroConjuntoByIdHandler;
use App\Application\ParametroConjunto\Handlers\ListParametrosConjuntoHandler;
use App\Application\ParametroConjunto\Handlers\UpdateParametroConjuntoHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexParametroConjuntoRequest;
use App\Http\Requests\StoreParametroConjuntoRequest;
use App\Http\Requests\UpdateParametroConjuntoRequest;
use App\Http\Resources\ParametroConjuntoResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class ParametroConjuntoController extends Controller
{
    public function index(IndexParametroConjuntoRequest $request, ListParametrosConjuntoHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListParametrosConjuntoData::fromRequest($request->validated()));

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

        return ParametroConjuntoResource::collection($paginator)->response();
    }

    public function store(StoreParametroConjuntoRequest $request, CreateParametroConjuntoHandler $handler): JsonResponse
    {
        $row = $handler->handle(CreateParametroConjuntoData::fromRequest($request->validated()));

        return (new ParametroConjuntoResource($row))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetParametroConjuntoByIdHandler $handler): JsonResponse
    {
        return (new ParametroConjuntoResource($handler->handle($id)))->response();
    }

    public function update(UpdateParametroConjuntoRequest $request, int $id, UpdateParametroConjuntoHandler $handler): JsonResponse
    {
        $row = $handler->handle($id, UpdateParametroConjuntoData::fromRequest($request->validated()));

        return (new ParametroConjuntoResource($row))->response();
    }

    public function destroy(int $id, DeleteParametroConjuntoHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
