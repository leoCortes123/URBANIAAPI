<?php

namespace App\Domain\UsuarioTipoDocumento\Entities;

final class UsuarioTipoDocumento
{
    public function __construct(
        private ?int $id,
        private string $nombreTipodocu,
        private ?string $codigoTipodocu,
        private ?bool $estadoTipodocu,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function nombreTipodocu(): string
    {
        return $this->nombreTipodocu;
    }

    public function codigoTipodocu(): ?string
    {
        return $this->codigoTipodocu;
    }

    public function estadoTipodocu(): ?bool
    {
        return $this->estadoTipodocu;
    }
}
