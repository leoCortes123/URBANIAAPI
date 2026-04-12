<?php

namespace App\Http\Controllers\Api;

use App\Application\CategoriaConcepto\DTOs\CreateCategoriaConceptoData;
use App\Application\CategoriaConcepto\DTOs\ListCategoriaConceptosData;
use App\Application\CategoriaConcepto\DTOs\UpdateCategoriaConceptoData;
use App\Application\CategoriaConcepto\Handlers\CreateCategoriaConceptoHandler;
use App\Application\CategoriaConcepto\Handlers\DeleteCategoriaConceptoHandler;
use App\Application\CategoriaConcepto\Handlers\GetCategoriaConceptoByIdHandler;
use App\Application\CategoriaConcepto\Handlers\ListCategoriaConceptosHandler;
use App\Application\CategoriaConcepto\Handlers\UpdateCategoriaConceptoHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexCategoriaConceptoRequest;
use App\Http\Requests\StoreCategoriaConceptoRequest;
use App\Http\Requests\UpdateCategoriaConceptoRequest;
use App\Http\Resources\CategoriaConceptoResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class CategoriaConceptoController extends Controller
{
    public function index(IndexCategoriaConceptoRequest $request, ListCategoriaConceptosHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListCategoriaConceptosData::fromRequest($request->validated()));

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

        return CategoriaConceptoResource::collection($paginator)->response();
    }

    public function store(StoreCategoriaConceptoRequest $request, CreateCategoriaConceptoHandler $handler): JsonResponse
    {
        $categoriaConcepto = $handler->handle(CreateCategoriaConceptoData::fromRequest($request->validated()));

        return (new CategoriaConceptoResource($categoriaConcepto))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetCategoriaConceptoByIdHandler $handler): JsonResponse
    {
        return (new CategoriaConceptoResource($handler->handle($id)))->response();
    }

    public function update(UpdateCategoriaConceptoRequest $request, int $id, UpdateCategoriaConceptoHandler $handler): JsonResponse
    {
        $categoriaConcepto = $handler->handle($id, UpdateCategoriaConceptoData::fromRequest($request->validated()));

        return (new CategoriaConceptoResource($categoriaConcepto))->response();
    }

    public function destroy(int $id, DeleteCategoriaConceptoHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
