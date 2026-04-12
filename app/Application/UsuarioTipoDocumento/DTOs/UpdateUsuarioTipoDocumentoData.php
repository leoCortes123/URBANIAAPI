<?php

namespace App\Application\UsuarioTipoDocumento\DTOs;

final readonly class UpdateUsuarioTipoDocumentoData
{
    public function __construct(
        public string $nombreTipodocu,
        public ?string $codigoTipodocu,
        public ?bool $estadoTipodocu,
    ) {
    }

    /**
     * @param  array<string, mixed>  $validated
     */
    public static function fromRequest(array $validated): self
    {
        return new self(
            $validated['nombre_tipodocu'],
            $validated['codigo_tipodocu'] ?? null,
            $validated['estado_tipodocu'] ?? null,
        );
    }
}
