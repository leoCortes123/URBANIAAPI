<?php

namespace App\Http\Controllers\Api;

use App\Application\Municipio\DTOs\CreateMunicipioData;
use App\Application\Municipio\DTOs\ListMunicipiosData;
use App\Application\Municipio\DTOs\UpdateMunicipioData;
use App\Application\Municipio\Handlers\CreateMunicipioHandler;
use App\Application\Municipio\Handlers\DeleteMunicipioHandler;
use App\Application\Municipio\Handlers\GetMunicipioByIdHandler;
use App\Application\Municipio\Handlers\ListMunicipiosHandler;
use App\Application\Municipio\Handlers\UpdateMunicipioHandler;
use App\Http\Controllers\Controller;
use App\Http\Requests\IndexMunicipioRequest;
use App\Http\Requests\StoreMunicipioRequest;
use App\Http\Requests\UpdateMunicipioRequest;
use App\Http\Resources\MunicipioResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;

class MunicipioController extends Controller
{
    public function index(IndexMunicipioRequest $request, ListMunicipiosHandler $handler): JsonResponse
    {
        $page = $handler->handle(ListMunicipiosData::fromRequest($request->validated()));

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

        return MunicipioResource::collection($paginator)->response();
    }

    public function store(StoreMunicipioRequest $request, CreateMunicipioHandler $handler): JsonResponse
    {
        $row = $handler->handle(CreateMunicipioData::fromRequest($request->validated()));

        return (new MunicipioResource($row))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(int $id, GetMunicipioByIdHandler $handler): JsonResponse
    {
        return (new MunicipioResource($handler->handle($id)))->response();
    }

    public function update(UpdateMunicipioRequest $request, int $id, UpdateMunicipioHandler $handler): JsonResponse
    {
        $row = $handler->handle($id, UpdateMunicipioData::fromRequest($request->validated()));

        return (new MunicipioResource($row))->response();
    }

    public function destroy(int $id, DeleteMunicipioHandler $handler): JsonResponse
    {
        $handler->handle($id);

        return response()->json(null, Response::HTTP_NO_CONTENT);
    }
}
