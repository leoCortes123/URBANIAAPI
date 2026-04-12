<?php

declare(strict_types=1);

namespace App\OpenApi;

use OpenApi\Attributes as OA;

#[OA\Info(
    version: "1.0.0",
    description: "API Documentation for Urbania API",
    title: "Urbania API Documentation"
)]
#[OA\Server(
    url: "http://urbaniaapi.test",  // Cambia esto a la URL de tu proyecto en Herd
    description: "Laravel Herd Local Server"
)]
#[OA\Components(
    securitySchemes: [
        new OA\SecurityScheme(
            securityScheme: "bearerAuth", 
            type: "http",
            scheme: "bearer"
        )
    ]
)]
class OpenApi
{
    // Esta clase solo contiene las anotaciones de configuración
}