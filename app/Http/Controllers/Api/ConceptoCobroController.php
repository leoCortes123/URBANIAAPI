<?php

namespace App\Http\Controllers\Api;

use App\Application\ConceptoCobro\DTOs\CreateConceptoCobroData;
use App\Application\ConceptoCobro\DTOs\ListConceptosCobroData;
use App\Application\ConceptoCobro\DTOs\UpdateConceptoCobroData;
use App\Application\ConceptoCobro\Handlers\CreateConceptoCobroHandler;
use App\Application\ConceptoCobro\Handlers\DeleteConceptoCobroHandler;
use App\Application\ConceptoCobro\Handlers\GetConceptoCobroByIdHandler;
use App\Application\ConceptoCobro\Handlers\ListConceptosCobroHandler;
use App\Application\ConceptoCobro\Handlers\UpdateConceptoCobroHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexConceptoCobroRequest;
use App\Http\Requests\StoreConceptoCobroRequest;
use App\Http\Requests\UpdateConceptoCobroRequest;
use App\Http\Resources\ConceptoCobroResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class ConceptoCobroController extends Controller
{
    public function index(IndexConceptoCobroRequest $request, ListConceptosCobroHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListConceptosCobroData::fromRequest($request->validated()));

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

        return ConceptoCobroResource::collection($paginator)->response();
    }

    public function store(StoreConceptoCobroRequest $request, CreateConceptoCobroHandler $handler): JsonResponse
    {
        $row = $handler->handle(CreateConceptoCobroData::fromRequest($request->validated()));

        return (new ConceptoCobroResource($row))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetConceptoCobroByIdHandler $handler): JsonResponse
    {
        return (new ConceptoCobroResource($handler->handle($id)))->response();
    }

    public function update(UpdateConceptoCobroRequest $request, int $id, UpdateConceptoCobroHandler $handler): JsonResponse
    {
        $row = $handler->handle($id, UpdateConceptoCobroData::fromRequest($request->validated()));

        return (new ConceptoCobroResource($row))->response();
    }

    public function destroy(int $id, DeleteConceptoCobroHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
