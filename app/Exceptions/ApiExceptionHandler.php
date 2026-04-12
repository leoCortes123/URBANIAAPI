<?php

namespace App\Exceptions;

use App\Domain\Common\Exceptions\DomainException;
use App\Domain\Common\Exceptions\ResourceNotFoundException;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

final class ApiExceptionHandler
{
    public static function register(Exceptions $exceptions): void
    {
        $exceptions->renderable(function (ResourceNotFoundException $e, Request $request) {
            if (! self::shouldRenderJson($request)) {
                return null;
            }

            return response()->json(['message' => $e->getMessage()], Response::HTTP_NOT_FOUND);
        });

        $exceptions->renderable(function (DomainException $e, Request $request) {
            if (! self::shouldRenderJson($request)) {
                return null;
            }

            return response()->json(['message' => $e->getMessage()], Response::HTTP_BAD_REQUEST);
        });
    }

    private static function shouldRenderJson(Request $request): bool
    {
        return $request->is('api/*') || $request->expectsJson();
    }
}
