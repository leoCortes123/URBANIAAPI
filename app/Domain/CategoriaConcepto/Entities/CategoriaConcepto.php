<?php

namespace App\Domain\CategoriaConcepto\Entities;

final class CategoriaConcepto
{
    public function __construct(
        private ?int $id,
        private string $nombreCatconc,
        private ?string $codigoCatconc,
        private ?string $descripcionCatconc,
        private ?int $ordenCatconc,
        private ?bool $estadoCatconc,
    ) {
    }

    public function id(): ?int
    {
        return $this->id;
    }

    public function nombreCatconc(): string
    {
        return $this->nombreCatconc;
    }

    public function codigoCatconc(): ?string
    {
        return $this->codigoCatconc;
    }

    public function descripcionCatconc(): ?string
    {
        return $this->descripcionCatconc;
    }

    public function ordenCatconc(): ?int
    {
        return $this->ordenCatconc;
    }

    public function estadoCatconc(): ?bool
    {
        return $this->estadoCatconc;
    }
}
