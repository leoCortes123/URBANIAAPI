<?php

namespace App\Domain\ParametroSistema\Entities;

final class ParametroSistema
{
    public function __construct(
        private ?int $id,
        private string $codigoParamSist,
        private string $nombreParamSist,
        private ?string $valorParamSist,
        private string $tipoDatoParamSist,
        private ?string $descripcionParamSist,
        private ?bool $editableParamSist,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function codigoParamSist(): string
    {
        return $this->codigoParamSist;
    }

    public function nombreParamSist(): string
    {
        return $this->nombreParamSist;
    }

    public function valorParamSist(): ?string
    {
        return $this->valorParamSist;
    }

    public function tipoDatoParamSist(): string
    {
        return $this->tipoDatoParamSist;
    }

    public function descripcionParamSist(): ?string
    {
        return $this->descripcionParamSist;
    }

    public function editableParamSist(): ?bool
    {
        return $this->editableParamSist;
    }
}
